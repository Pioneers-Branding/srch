<?php

namespace Modules\ProductBooking\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\ProductBooking\Models\Order;
use Modules\ProductBooking\Models\OrderProduct;
use Modules\ProductBooking\Models\Cart;
use Modules\ProductBooking\Trait\OrderTrait;
use Modules\ProductBooking\Transformers\OrderDetailResource;
use Modules\ProductBooking\Transformers\OrderListResource;
use Modules\ProductBooking\Transformers\OrderResource;
use Modules\Constant\Models\Constant;

use DB;
//use Modules\ProductBooking\Trait\OrderTrait;

class OrdersController extends Controller
{
    use OrderTrait;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Orders';
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if (! empty($request->date) && ! empty($request->date)) {
            $data['start_date_time'] = Carbon::createFromFormat('d/m/Y h:i A', $data['date'].' '.$data['time']);
        }
        $data['user_id'] = ! empty($request->user_id) ? $request->user_id : auth()->user()->id;
        
        $cart = Cart::where('user_id' , $data['user_id'])->get();

        $order = Order::create($data);
        
        $this->updateOrderProduct($cart, $order->id , $data['user_id']);

        $message = 'New '.Str::singular($this->module_title).' Added';

        return response()->json(['message' => $message, 'status' => true, 'order_id' => $order->id], 200);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->update($request->all());

        $this->updateOrderProduct($request->products, $order->id);

        $message = 'New '.Str::singular($this->module_title).' updated';

        return response()->json(['message' => $message, 'status' => true], 200);
    }

    public function updateStatus(Request $request) 
    {
        $id = $request->id;
        $data = Order::with('products')->findOrFail($id);

        $data->status = $request->status;
        $data->update();

        $message = __('Order Status Changed Successfully');

        return response()->json(['message' => $message, 'status' => true], 200);
    }

    public function orderList(Request $request)
    {
        
        $user = \Auth::user();
        
        $user_id = $request->user_id ? $request->user_id : $user->id;

        $order = Order::where('user_id', $user_id)->with('order_product');

        if ($request->has('status') && isset($request->status)) {
            $order->where('status', $request->status);
        }

        $per_page = $request->input('per_page', 10);
        if ($request->has('per_page') && ! empty($request->per_page)) {
            if (is_numeric($request->per_page)) {
                $per_page = $request->per_page;
            }
            if ($request->per_page === 'all') {
                $per_page = $order->count();
            }
        }
        $orderBy = 'desc';
        if ($request->has('order_by') && ! empty($request->order_by)) {
            $orderBy = $request->order_by;
        }
        // Apply search conditions for booking ID, employee name, and service name
        if ($request->has('search') && ! empty($request->search)) {
            $search = $request->search;
            $order->where(function ($query) use ($search) {
                $query->where('id', 'LIKE', "%$search%")
                    ->orWhereHas('products', function ($subquery) use ($search) {
                        $subquery->whereHas('product', function ($employeeQuery) use ($search) {
                            $employeeQuery->where('name', 'LIKE', "%$search%");
                        });
                    });
            });
        }

        $order = $order->get();;

        $items = OrderListResource::collection($order);

        return response()->json([
            'status' => true,
            'data' => $items,
            'message' => __('Order List'),
        ], 200);
    }
    

    public function orderDetail(Request $request)
    {
        $id = $request->id;

        $order_data = Booking::with(['user', 'order_service', 'orderTransaction'])->where('id', $id)->first();

        if ($order_data == null) {
            $message = __('order not found');

            return response()->json([
                'status' => false,
                'message' => $message,
            ], 200);
        }
        $order_data = new OrderDetailResource($order_data);

        return response()->json([
            'status' => true,
            'data' => $order_data,
            'message' => __('Order detail'),
        ], 200);
    }

    public function searchOrders(Request $request)
    {
        $keyword = $request->input('keyword');

        $orders = Order::where('note', 'like', "%{$keyword}%")
            ->with('user')
            ->get();

        return response()->json([
            'status' => true,
            'data' => OrderResource::collection($orders),
            'message' => __('Order search'),
        ], 200);
    }

    public function statusList()
    {
        $order_status = Constant::getAllConstant()->where('type', 'BOOKING_STATUS');
        $checkout_sequence = $order_status->where('name', 'check_in')->first()->sequence ?? 0;
        $orderColors = Constant::getAllConstant()->where('type', 'BOOKING_STATUS_COLOR');
        $statusList = [];
        $finalstatusList = [];

        foreach ($order_status as $key => $value) {
            if ($value->name !== 'cancelled') {
                $statusList = [
                    'status' => $value->name,
                    'title' => $value->value,
                    'color_hex' => $orderColors->where('sub_type', $value->name)->first()->name,
                    'is_disabled' => $value->sequence >= $checkout_sequence,
                ];
                array_push($finalstatusList, $statusList);
                $nextStatus = $order_status->where('sequence', $value->sequence + 1)->first();
                if ($nextStatus) {
                    $statusList[$value->name]['next_status'] = $nextStatus->name;
                }
            } else {
                $statusList = [
                    'status' => $value->name,
                    'title' => $value->value,
                    'color_hex' => $orderColors->where('sub_type', $value->name)->first()->name,
                    'is_disabled' => true,
                ];
                array_push($finalstatusList, $statusList);
            }
        }

        return response()->json([
            'status' => true,
            'data' => $finalstatusList,
            'message' => __('Order.status'),
        ], 200);
    }

    public function orderUpdate(Request $request)
    {

        $data = $request->all();
        $id = $request->id;

        if (! empty($request->date)) {
            $data['start_date_time'] = $request->date;
        }
        $orderdata = Order::find($id);

        $orderdata->update($data);

        $order = Order::findOrFail($id);

        $order->update($data);

        $orderProduct = OrderService::where('order_id', $order->id)->get();

        $this->updateOrderProduct($orderProduct, $order->id);

        return response()->json([
            'status' => true,
            'message' => __('Order Updated Successfully'),
        ], 200);
    }
    
    
    public function vendorStock(Request $request)
    {
        if ($request->user_id == null || empty($request->user_id)) {
            $message = __('user_id field is required');

            return response()->json([
                'status' => false,
                'message' => $message,
            ], 200);
        }
    
        $categoryId = $request->category_id;
        
        $user_id = \Auth::user() ? Auth::user()->id : $request->user_id;
        
        $orderIds = Order::where(['user_id' => $user_id, 'status' => 'confirmed'])->pluck('id');

        $orderProducts = OrderProduct::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
        ->whereIn('order_id', $orderIds);
        
        if (!empty($categoryId)) {
            $orderProducts->whereHas('product.category', function ($query) use ($categoryId) {
                $query->where('id', $categoryId);
            });
        }
        
        $orderProducts = $orderProducts->groupBy('product_id')
        ->with('product:id,name,slug')->get();

        foreach ($orderProducts as $product) {
            $product->product->product_image = $product->product->feature_image;
            $product->quantity = intval($product->total_quantity);
        }


         
        return response()->json([
            'status' => true,
            'data'   => $orderProducts,
            'message' => __('Stock List'),
        ], 200);
    }
    
    public function productSearch(Request $request)
    {
        $user = \Auth::user();
        
        $user_id = $request->user_id ? $request->user_id : $user->id;
    
        $orderIds = Order::where(['user_id' => $user_id, 'status' => 'confirmed'])->pluck('id');
    
        $orderProducts = OrderProduct::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->whereIn('order_id', $orderIds)
            ->groupBy('product_id'); 
    
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            
            $orderProducts->where('quantity', '>', 0)
                          ->whereHas('product', function ($subquery) use ($search) {
                              $subquery->where('name', 'LIKE', "%$search%");
                          });
        }
    
        $orderProducts = $orderProducts->with('product:id,name,slug,description,default_price')->get();
    
        $items = [];
    
        foreach ($orderProducts as $product) {
            $item = [
                'id' => $product->product->id,
                'order_product_id' => $product->id,
                'name' => $product->product->name,
                'product_image' => $product->product->feature_image,
                'description' => $product->product->description,
                'quantity' => intval($product->total_quantity),
                'default_price' => $product->product->default_price
            ];
            $items[] = $item;
        }
    
        return response()->json([
            'status' => true,
            'data' => $items,
            'message' => __('Order List'),
        ], 200);
    }




}
