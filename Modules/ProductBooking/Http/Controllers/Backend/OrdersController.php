<?php

namespace Modules\ProductBooking\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Query\Expression;
use Illuminate\Http\Request;
use Modules\ProductBooking\Models\Order;
use Modules\ProductBooking\Models\OrderProduct;
use Modules\ProductBooking\Models\Cart;
use Modules\ProductBooking\Trait\OrderTrait;
use Modules\ProductBooking\Trait\PaymentTrait;
use Modules\ProductBooking\Transformers\OrderDetailResource;
use Modules\ProductBooking\Transformers\OrderListResource;
use Modules\ProductBooking\Transformers\OrderResource;
use Modules\Constant\Models\Constant;
use Modules\ShopProduct\Models\ShopProduct;
use Modules\Tax\Models\Tax;
use Modules\ProductBooking\Models\OrderTransaction;
use Yajra\DataTables\DataTables;

class OrdersController extends Controller
{
    // use Authorizable;
    use OrderTrait;
    use PaymentTrait;

    protected string $exportClass = '\App\Exports\OrdersExport';

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Orders';

        // module name
        $this->module_name = 'orders';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        view()->share([
            'module_title' => $this->module_title,
            'module_name' => $this->module_name,
            'module_icon' => $this->module_icon,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $module_action = 'List';

        $statusList = $this->statusList();

        $order = Order::find(request()->booking_id);

        $date = $order->start_date_time ?? date('Y-m-d');

        return view('productbooking::backend.orders.index', compact('module_action', 'statusList', 'date'));
    }

    public function statusList()
    {
        $order_status = Constant::getAllConstant()->where('type', 'BOOKING_STATUS');
        $checkout_sequence = $order_status->where('name', 'check_in')->first()->sequence ?? 0;
        $orderColors = Constant::getAllConstant()->where('type', 'BOOKING_STATUS_COLOR');
        $statusList = [];

        foreach ($order_status as $key => $value) {
            if ($value->name !== 'cancelled') {
                $statusList[$value->name] = [
                    'title' => $value->value,
                    'color_hex' => $orderColors->where('sub_type', $value->name)->first()->name,
                    'is_disabled' => $value->sequence >= $checkout_sequence,
                ];
                $nextStatus = $order_status->where('sequence', $value->sequence + 1)->first();
                if ($nextStatus) {
                    $statusList[$value->name]['next_status'] = $nextStatus->name;
                }
            } else {
                $statusList[$value->name] = [
                    'title' => $value->value,
                    'color_hex' => $orderColors->where('sub_type', $value->name)->first()->name,
                    'is_disabled' => true,
                ];
            }
        }

        return $statusList;
    }

    /**
     * @return Response
     */
    public function index_list(Request $request)
    {
        $date = $request->date;

        $data = OrderProduct::with('booking', 'employee', 'product')
            ->whereHas('booking', function ($q) use ($date) {
                if (! empty($date)) {
                    $q->whereDate('start_date_time', $date);
                }
                $q->where('status', '!=', 'cancelled');
            })
            ->get();

        $updated_data = [];
        $statusList = $this->statusList();
        foreach ($data as $key => $value) {
            $duration = $value->duration_min;

            $startTime = $value->start_date_time;

            $endTime = Carbon::parse($startTime)->addMinutes($duration);

            $serviceName = $value->service->name ?? '';

            $customerName = $value->booking->user->full_name ?? 'Anonymous';

            $updated_data[$key] = [
                'id' => $value->booking_id,
                'start' => customDate($startTime, 'Y-m-d H:i'),
                'end' => customDate($endTime, 'Y-m-d H:i'),
                'resourceId' => $value->employee_id,
                'title' => $serviceName,
                'titleHTML' => view('productbooking::backend.orders.calender.event', compact('serviceName', 'customerName'))->render(),
                'color' => $statusList[$value->booking->status]['color_hex'],
            ];
            $startTime = $endTime;
        }
        $employees = User::bookingEmployeesList()->get();
        $resource = [];
        foreach ($employees as $employee) {
            $resource[] = [
                'id' => $employee->id,
                'title' => $employee->full_name,
                'titleHTML' => '<div class="d-flex gap-3 justify-content-center align-items-center py-3"><img src="'.$employee->profile_image.'" class="avatar avatar-40 rounded-pill" alt="employee" />'.$employee->full_name.'</div>',
            ];
        }

        return response()->json([
            'data' => $updated_data,
            'employees' => $resource,
        ]);
    }

    public function services_index_list(Request $request)
    {
        $employee_id = $request->employee_id;
        $branch_id = $request->branch_id;
        $data = Service::select('services.name as service_name', 'service_branches.*')
            ->with('employee')
            ->leftJoin('service_branches', 'service_branches.service_id', 'services.id')
            ->whereHas('category', function ($q) {
                $q->active();
            })
            ->where('branch_id', $branch_id);

        if (isset($employee_id)) {
            $data = $data->whereHas('employee', function ($q) use ($employee_id) {
                $q->where('employee_id', $employee_id);
            });
        }

        $data = $data->get();

        return response()->json($data);
    }

    public function datatable_view(Request $request)
    {
        $module_action = 'List';

        $filter = [
            'status' => $request->status,
        ];

        $booking_status = Constant::getAllConstant()->where('type', 'BOOKING_STATUS');

        $export_import = true;
        $export_columns = [
            [
                'value' => 'date',
                'text' => 'Date',
            ],
            [
                'value' => 'customer',
                'text' => 'Customer Name',
            ],
            [
                'value' => 'service_amount',
                'text' => 'Amount',
            ],
            [
                'value' => 'service_duration',
                'text' => 'Duration',
            ],
            [
                'value' => 'employee',
                'text' => 'Staff Name',
            ],
            [
                'value' => 'services',
                'text' => 'Services',
            ],
            [
                'value' => 'status',
                'text' => 'Status',
            ],
            [
                'value' => 'updated_at',
                'text' => 'Updated At',
            ],
        ];
        $export_url = route('backend.bookings.export');

        return view('productbooking::backend.orders.index_datatable', compact('module_action', 'filter', 'booking_status', 'export_import', 'export_columns', 'export_url'));
    }

    public function index_data(Datatables $datatable, Request $request)
    {
        $module_name = $this->module_name;

        $query = Order::query()->with('user', 'products', 'mainProducts');

        $filter = $request->filter;

        if (isset($filter)) {
            if (isset($filter['column_status'])) {
                $query->where('status', $filter['column_status']);
            }
            if (isset($filter['booking_date'])) {
                try {
                    $startDate = explode(' to ', $filter['booking_date'])[0];
                    $endDate = explode(' to ', $filter['booking_date'])[1];
                    $query->whereDate('start_date_time', '>=', $startDate);
                    $query->whereDate('start_date_time', '<=', $endDate);
                } catch (\Exception $e) {
                    \Log::error($e->getMessage());
                }
            }
            if (isset($filter['user_id'])) {
                $query->where('user_id', $filter['user_id']);
            }
            if (isset($filter['product_id'])) {
                $query->whereHas('products', function ($q) use ($filter) {
                    $q->whereIn('product_id', $filter['product_id']);
                });
            }
        }

        $booking_status = Constant::getAllConstant()->where('type', 'BOOKING_STATUS')->where('name', '!=', 'completed');
        $booking_colors = Constant::getAllConstant()->where('type', 'BOOKING_STATUS_COLOR');

        return $datatable->eloquent($query)
            ->addColumn('check', function ($row) {
                return '<input type="checkbox" class="form-check-input select-table-row"  id="datatable-row-'.$row->id.'"  name="datatable_ids[]" value="'.$row->id.'" onclick="dataTableRowCheck('.$row->id.')">';
            })
            ->addColumn('action', function ($data) use ($module_name) {
                return view('productbooking::backend.orders.datatable.action_column', compact('module_name', 'data'));
            })
            ->editColumn('status', function ($data) use ($booking_status, $booking_colors) {
                return view('productbooking::backend.orders.datatable.select_column', compact('data', 'booking_status', 'booking_colors'));
            })
            ->editColumn('user_id', function ($data) {
                return view('productbooking::backend.orders.datatable.user_id', compact('data'));
            })
            ->editColumn('products', function ($data) {
                return view('productbooking::backend.orders.datatable.products', compact('data'));
            })
            ->editColumn('start_date_time', function ($data) {
                return customDate($data->start_date_time);
            })
            ->editColumn('updated_at', function ($data) {
                $diff = timeAgoInt($data->updated_at);

                if ($diff < 25) {
                    return timeAgo($data->updated_at);
                } else {
                    return customDate($data->updated_at);
                }
            })
            ->orderColumn('product_amount', function ($query, $order) {
                
                
                $query->selectSub(function ($subquery) {
                    $subquery->selectRaw('SUM(price)')
                        ->from('order_products')
                        ->whereColumn('order_id', 'orders.id');
                }, 'product_amount')
                ->orderBy('product_amount', $order);
            }, 1)


            ->filterColumn('products', function ($query, $keyword) {
                $query->whereHas('mainProducts', function ($q) use ($keyword) {
                    $q->where('name', 'like', '%'.$keyword.'%');
                });
            })
            ->filterColumn('user_id', function ($query, $keyword) {
                if (! empty($keyword)) {
                    $query->whereHas('user', function ($q) use ($keyword) {
                        $q->where('first_name', 'like', '%'.$keyword.'%');
                    });
                }
            })
            ->rawColumns(['check', 'action', 'status', 'products' ,'start_date_time'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $orderData = $request->except(['products', '_token']);

        $orderData['status'] = 'confirmed';

        $order = Order::create($orderData);

        $this->updateOrderProduct($request->products, $order->id, $order->user_id);

        $message = __('messages.create_form', ['form' => __('booking.singular_title')]);

        try {
            // $this->sendNotificationOnBookingUpdate('new_booking', $order);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }

        $data = Order::with('order_product', 'user')->findOrFail($order->id);

        return response()->json(['message' => $message, 'status' => true, 'data' => new OrderResource($data)], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $order = Order::with(['order_product', 'user'])->find($id);

        if (is_null($order)) {
            return response()->json(['message' => __('messages.booking_not_found')], 404);
        }

        $orderTransaction = OrderTransaction::where('order_id', $order->id)->where('payment_status', 1)->first();

        $data = [
            'booking' => new OrderResource($order),
            'services_total_amount' => $order->order_product->sum('price'),
            'booking_transaction' => $orderTransaction,
        ];

        return response()->json(['status' => true, 'data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data = Order::with('order_product', 'user')->findOrFail($id);

        return response()->json(['data' => new OrderResource($data), 'status' => true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->update($request->all());

        $this->updateOrderProduct($request->products, $order->id, $order->user_id);

        $message = __('booking.booking_service_update', ['form' => __('booking.singular_title')]);

        $data = Order::with('order_product', 'user')->findOrFail($order->id);

        return response()->json(['message' => $message, 'status' => true, 'data' => new OrderResource($data)], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        $order->delete();

        $message = __('messages.delete_form', ['form' => __('booking.singular_title')]);

        return response()->json(['message' => $message, 'status' => true], 200);
    }

    public function updateStatus($id, Request $request)
    {
        $order = Order::with('user' , 'order_product')->findOrFail($id);
        $status = $request->status;

        if (isset($request->action_type) && $request->action_type == 'update-status') {
            $status = $request->value;
        }

        $order->update(['status' => $status]);
        
        if ($status == 'confirmed') {
            foreach ($order->order_product as $list) {
                $product = ShopProduct::find($list->product_id);
                if ($product) {
                    $newQuantity = max(0, $product->quantity - $list->quantity);
                    $product->update(['quantity' => $newQuantity]);
                }
            }
        }
        $notify_type = null;

        switch ($status) {
            case 'check_in':
                $notify_type = 'check_in_booking';
                break;
            case 'checkout':
                $notify_type = 'checkout_booking';
                break;
            case 'completed':
                $notify_type = 'complete_booking';
                break;
            case 'cancelled':
                $notify_type = 'cancel_booking';
                break;
        }

        if (isset($notify_type)) {
            try {
                $this->sendNotificationOnBookingUpdate($notify_type, $order);
            } catch (\Exception $e) {
                \Log::error($e->getMessage());
            }
        }

        $message = __('booking.status_update');

        return response()->json(['data' => $order, 'message' => $message, 'status' => true]);
    }

    public function bulk_action(Request $request)
    {
        $ids = explode(',', $request->rowIds);

        $actionType = $request->action_type;

        $message = __('messages.bulk_update');

        switch ($actionType) {
            case 'change-status':
                $branches = Order::whereIn('id', $ids)->update(['status' => $request->status]);
                $message = __('messages.bulk_booking_update');
                break;

            case 'delete':
                Order::whereIn('id', $ids)->delete();
                $message = __('messages.bulk_booking_delete');
                break;

            default:
                return response()->json(['status' => false, 'message' => __('booking.booking_action_invalid')]);
                break;
        }

        return response()->json(['status' => true, 'message' => $message]);
    }

    public function booking_slots(Request $request)
    {
        $day = date('l', strtotime($request->date));

        $branch_id = $request->branch_id;

        $slots = $this->getSlots($request->date, $day, $branch_id);

        return response()->json(['status' => true, 'data' => $slots]);
    }

    public function payment_create(Request $request)
    {
        $order_id = $request->order_id ?? $request->booking_id;
        $order = Order::find($order_id);

        $order_services = OrderProduct::where('order_id', $order_id)->get();
        $total_service_amount = $order_services->sum('price');

        $currency = \Currency::getDefaultCurrency();
        $payment_methods = $order->branch->payment_method;
        $constant = Constant::where('type', 'PAYMENT_METHODS')->whereIn('name', $payment_methods)->get();
        $payment_methods = $constant->map(function ($row) {
            return [
                'id' => $row->name,
                'text' => $row->value,
            ];
        })->toArray();
        $data = [
            'booking_amounts' => [
                'amount' => $total_service_amount,
                'currency' => $currency->currency_symbol,
            ],
            'PAYMENT_METHODS' => $payment_methods,
            'tax' => Tax::active()->get(),
        ];

        return response()->json(['status' => true, 'data' => $data]);
    }

    public function booking_payment(Request $request, Order $order_id)
    {

        $data = $request->all();

        $order_id = $order_id['id'];

        $responseData = $this->getpayment_method($data, $order_id);

        return response()->json(['status' => true, 'data' => $responseData]);
    }

    public function booking_payment_update(Request $request, $order_transaction_id)
    {
        $data = $request->all();

        $responseData = $this->getrazorpaypayments($data, $order_transaction_id);

        if (isset($responseData['booking'])) {
            $queryData = Order::find($responseData['booking']->id);
            try {
                $this->sendNotificationOnBookingUpdate('complete_booking', $queryData);
            } catch (\Exception $e) {
                \Log::error($e->getMessage());
            }
        }

        return response()->json(['status' => true, 'data' => $responseData]);
    }

    public function checkout(Order $order_id, Request $request)
    {
        $this->updateOrderProduct($request->products, $order_id->id, $order_id->user_id);

        $queryData = Order::with('order_product', 'user')->findOrFail($order_id->id);

        return response()->json(['status' => true, 'data' => new OrderResource($queryData), 'message' => __('booking.booking_service_update')]);
    }

    public function stripe_payment(Request $request)
    {

        $data = $request->data;

        $checkout_session = $this->getstripepayments($data);

        if (isset($checkout_session['message'])) {

            return response()->json(['status' => false, 'data' => $checkout_session]);
        } else {

            OrderTransaction::where('id', $data['order_transaction_id'])->update(['request_token' => $checkout_session['id']]);

            return response()->json(['status' => true, 'data_url' => $checkout_session->url, 'data' => $checkout_session]);
        }
    }

    public function payment_success($id)
    {

        $order_transaction = OrderTransaction::where('id', $id)->first();

        $request_token = $order_transaction['request_token'];

        $order_id = $order_transaction['order_id'];

        $session_object = $this->getstripePaymnetId($request_token);

        if ($session_object['payment_intent'] !== '' && $session_object['payment_status'] == 'paid') {

            OrderTransaction::where('id', $id)->update(['external_transaction_id' => $session_object['payment_intent'], 'payment_status' => 1]);

            Order::where('id', $order_id)->update(['status' => 'completed']);

            $queryData = Order::where('id', $order_id)->first();
            try {
                $this->sendNotificationOnBookingUpdate('complete_booking', $queryData);
            } catch (\Exception $e) {
                \Log::error($e->getMessage());
            }
        }

        return redirect()->route('backend.bookings.index');
    }
}
