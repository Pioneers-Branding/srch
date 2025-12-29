<?php

namespace Modules\Booking\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Booking\Models\Booking;
use Modules\Booking\Models\BookingService;
use Modules\Booking\Trait\BookingTrait;
use Modules\Booking\Transformers\BookingDetailResource;
use Modules\Booking\Transformers\BookingListResource;
use Modules\Booking\Transformers\BookingResource;
use Modules\Constant\Models\Constant;
use Modules\Booking\Models\BookingVendorProduct;
use Modules\Booking\Models\BookingVendorCancle;
use App\Models\User;
use Modules\Commission\Models\CommissionEarning;
use Modules\Booking\Models\BookingTransaction;
use Modules\CustomField\Models\CustomField;
use Modules\CustomField\Models\CustomFieldGroup;
use App\Helpers\CommonHelper;
use Modules\ProductBooking\Models\OrderProduct;
use Modules\ProductBooking\Models\Order;
use App\Models\Address;
use App\Models\WalletTransactions;

use Illuminate\Support\Facades\Validator;
use DB;
use App\Jobs\SendVendorNotifications;
use Modules\ProductBooking\Models\Cart;
use Modules\Coupon\Models\Coupon;

//use Modules\Booking\Trait\BookingTrait;

class BookingsController extends Controller
{
    use BookingTrait;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Bookings';
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if (! empty($request->date) && ! empty($request->date)) {
            $data['start_date_time'] = date('Y-m-d H:i:s', strtotime($data['date'] . ' ' . $data['time']));
        }
        $data['user_id'] = ! empty($request->user_id) ? $request->user_id : auth()->user()->id;
        
        
        $booking = Booking::create($data);
        
        // $this->updateBookingProduct($booking->id , auth()->user()->id);

        $message = 'New '.Str::singular($this->module_title).' Added';

        return response()->json(['message' => $message, 'status' => true, 'booking_id' => $booking->id], 200);
        
    }
    
    // public function sendNotificationToVendor($booking_id) {

        
    //     $address = Address::find($booking->address_id); 
    //     // if (!$address) {
    //     //     return; // Address not found, exit function
    //     // }
    
    //     $latitude = $address->latitude ?? '';
    //     $longitude = $address->longitude ?? '';
    //     $radius = 10; 
        
    //     $vendorIds = CommonHelper::getVendorsByLatLong($latitude , $longitude);
             
    //     // dd($vendorIds);
        
    //     foreach ($vendorIds as $vendor_id) {
    //         $booking->vendor_id = $vendor_id;
    //         try {

    //             $this->sendNotificationOnBookingUpdate('vendor_notification', $booking);
                
    //             $vendor = User::where('id' ,$vendor_id)->first();
                
    //             $user_name = $booking->user->name ?? '';
                
    //             $message = "New booking for $user_name for service(s): " . implode(', ', $booking->mainServices->pluck('name')->toArray());
                
    //             sendPushNotification($vendor, 'New Booking', $message);
                
    //         } catch (\Exception $e) {
    //             \Log::error($e->getMessage());
    //             // Log any errors, but continue sending notifications to other vendors
    //         }
    //     }    
    // }
    
    public function sendNotificationToVendors($booking)
    {
        $address = Address::find($booking->address_id); 
      
        $latitude = $address->latitude ?? '';
        $longitude = $address->longitude ?? '';
        $vendorIds = CommonHelper::getVendorsByLatLong($latitude , $longitude);
        
        SendVendorNotifications::dispatch($vendorIds, $booking->id);
        
        $booking->vendor_ids = $vendorIds;
        $this->sendNotificationOnBookingUpdate('vendor_notification', $booking);
    
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update($request->all());

        $this->updateBookingService($request->services, $booking->id);

        $message = 'New '.Str::singular($this->module_title).' updated';

        return response()->json(['message' => $message, 'status' => true], 200);
    }

    public function updateStatus(Request $request) 
    {
        $id = $request->id;
        $data = Booking::with('services')->findOrFail($id);

        $data->status = $request->status;
        $data->update();

        $message = __('booking.status_update');

        return response()->json(['message' => $message, 'status' => true], 200);
    }

    public function bookingList(Request $request)
    {
        $user = \Auth::user();

        $booking = Booking::where('user_id', $user->id)->with('booking_service', 'bookingTransaction' , 'commissionBooking');

        if ($request->has('status') && isset($request->status)) {
            $booking->where('status', $request->status);
        }

        $per_page = $request->input('per_page', 10);
        if ($request->has('per_page') && ! empty($request->per_page)) {
            if (is_numeric($request->per_page)) {
                $per_page = $request->per_page;
            }
            if ($request->per_page === 'all') {
                $per_page = $booking->count();
            }
        }
        $orderBy = 'desc';
        if ($request->has('order_by') && ! empty($request->order_by)) {
            $orderBy = $request->order_by;
        }
        // Apply search conditions for booking ID, employee name, and service name
        if ($request->has('search') && ! empty($request->search)) {
            $search = $request->search;
            $booking->where(function ($query) use ($search) {
                $query->where('id', 'LIKE', "%$search%")
                    ->orWhereHas('services', function ($subquery) use ($search) {
                        $subquery->whereHas('employee', function ($employeeQuery) use ($search) {
                            $employeeQuery->where(function ($nameQuery) use ($search) {
                                $nameQuery->where('first_name', 'LIKE', "%$search%")
                                    ->orWhere('last_name', 'LIKE', "%$search%");
                            });
                        });
                    })
                    ->orWhereHas('services', function ($subquery) use ($search) {
                        $subquery->whereHas('service', function ($employeeQuery) use ($search) {
                            $employeeQuery->where('name', 'LIKE', "%$search%");
                        });
                    });
            });
        }

        $booking = $booking->orderBy('updated_at', $orderBy)->paginate($per_page);

        $items = BookingListResource::collection($booking);

        return response()->json([
            'status' => true,
            'data' => $items,
            'message' => __('booking.booking_list'),
        ], 200);
    }
    
    
    // booking list for vendor 
    public function vendorBookingList(Request $request)
    {
        $user = \Auth::user();
        $user_id = $request->user_id ?? $user->id;
        $booking = Booking::with('booking_service', 'bookingTransaction');
        $cancleBookingIds = BookingVendorCancle::where('vendor_id' , $user_id)->pluck('booking_id');
    
        if ($request->has('status') && $request->status) {
            $booking->where('status', $request->status);
            if ($request->status !== 'pending') {
                $booking->where('vendor_id', $user_id);
            }
        } else {
            $booking->where('status', 'pending');
        }
    
        $per_page = $request->input('per_page', 10);
        if ($request->has('per_page') && !empty($request->per_page)) {
            if (is_numeric($request->per_page)) {
                $per_page = $request->per_page;
            }
            if ($request->per_page === 'all') {
                $per_page = $booking->count();
            }
        }
    
        $orderBy = 'desc';
        if ($request->has('order_by') && !empty($request->order_by)) {
            $orderBy = $request->order_by;
        }
    
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $booking->where(function ($query) use ($search) {
                $query->where('id', 'LIKE', "%$search%")
                    ->orWhereHas('services', function ($subquery) use ($search) {
                        $subquery->whereHas('service', function ($serviceQuery) use ($search) {
                            $serviceQuery->where('name', 'LIKE', "%$search%");
                        });
                    });
            });
        }
           
        if ($cancleBookingIds->isNotEmpty()) {
            $booking->whereNotIn('id', $cancleBookingIds);
        }
        
        $bookings = $booking->orderBy('created_at', $orderBy)->get();
        
    
        $newArray = [];
        
        foreach ($bookings as $booking) {
            $address = Address::find($booking->address_id); 
            if ($address) {
                $latitude = $address->latitude;
                $longitude = $address->longitude;
        
                $vendorIds = CommonHelper::getVendorsByLatLong($latitude , $longitude);
            
                if (in_array($user_id, $vendorIds)) {
                    $newArray[] = $booking; 
                }
            }
        }
    
        $items = BookingListResource::collection($newArray);
    
        return response()->json([
            'status' => true,
            'data' => $items,
            'message' => __('booking.booking_list'),
        ], 200);
    }

    public function vendorUpdateStatus(Request $request) 
    {
        
        if (empty($request->id)) {
            return response()->json(['status' => false,'message' => 'id field is required' ], 200);
        }
        
        if (empty($request->status)) {
            return response()->json(['status' => false,'message' => 'status field is required' ], 200);
        }
        
        if (empty($request->user_id)) {
            return response()->json(['status' => false,'message' => 'user_id field is required' ], 200);
        }
        
        $user = User::find($request->user_id);
        
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found.',
            ], 200);
        }

        
         $bookingdata = Booking::find($request->id);
        
        if ($bookingdata==null) {
            
            return response()->json([
            'status' => false,
            'message' => __('booking not found.'),
            ], 200);
        }
        
        $id = $request->id;
        $data = Booking::with('services')->findOrFail($id);

        $data->status = $request->status;
        
       
        if ($data->status=='confirmed') {

            // this condition for check wallet amount
            if ($user) {
                $commissionEarning = CommissionEarning::where('booking_id', $id)->first();
            
                if ($commissionEarning) {
                    $walletAmount  = $user->wallet_amount;
                    $deductionAmount = $commissionEarning->grant_total - $commissionEarning->vendor_amount;
            
                    if (!($walletAmount >= $deductionAmount)) {
                        return response()->json([
                            'status' => false,
                            'message' => 'Insufficient amount. Please add funds to your wallet.',
                        ], 200);
                    }

                }
            }
        
            // this condition for check booking already accept or not 
            if (!empty($data->vendor_id)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Booking already confirmed to vendor.',
                ], 200);
            }
          
           $data->vendor_id = $request->user_id;
        }
        
        $data->update();
        
        // if ($request->status == 'checkout') {
        //     $payment = BookingTransaction::where('booking_id', $id)->first();
            
        //     if ($payment) {
        //         $commissionEarning = CommissionEarning::where('booking_id', $id)->first();
        
        //         if ($commissionEarning) {
        //             if ($payment->transaction_type == 'cash') {
        //                 $deductionAmount = $commissionEarning->grant_total - $commissionEarning->vendor_amount;
                        
        //                 // Deduct the amount from user's wallet
        //                 $user->wallet_amount = ($user->wallet_amount - $deductionAmount);
                        
        //                 // Recalculate wallet points
        //                 $user->wallet_point = CommonHelper::userPointConvert($user->wallet_amount);
                        
        //                 // Save user wallet changes
        //                 $user->save();
                        
        //                 $walletData = [
        //                     'user_id' => $user->id,
        //                     'type' => 'deduct' ,
        //                     'amount' => $deductionAmount
        //                     ];
        //                 WalletTransactions::create($walletData);
            
        //                 // Mark admin or vendor payment status as paid
        //                 $commissionEarning->admin_payment_status = 'paid';
        //                 $commissionEarning->vendor_payment_status = 'paid';
        //             }
                    
        //             // Mark service status as completed
        //             $commissionEarning->service_status = 'completed';
                    
        //             $commissionEarning->save();
        //         }
                
        //         $payment->payment_status = 1;
        //         $payment->save();
        //     } 
        // }

        
        $message = __('booking.status_update');

         return response()->json([
            'status' => true,
            'message' => $message,
        ], 200);
    }

    public function bookingDetail(Request $request)
    {
        $id = $request->id;

        $booking_data = Booking::with(['branch', 'user', 'booking_service', 'bookingTransaction' , 'commissionBooking'])->where('id', $id)->first();

        if ($booking_data == null) {
            $message = __('booking.booking_not_found');

            return response()->json([
                'status' => false,
                'message' => __('booking.booking_not_found'),
            ], 200);
        }
        $booking_detail = new BookingDetailResource($booking_data);

        return response()->json([
            'status' => true,
            'data' => $booking_detail,
            'message' => __('booking.booking_detail'),
        ], 200);
    }

    public function searchBookings(Request $request)
    {
        $keyword = $request->input('keyword');

        $bookings = Booking::where('note', 'like', "%{$keyword}%")
            ->with('branch', 'user' , 'commissionBooking')
            ->get();

        return response()->json([
            'status' => true,
            'data' => BookingResource::collection($bookings),
            'message' => __('booking.search_booking'),
        ], 200);
    }

    public function statusList()
    {
        $booking_status = Constant::getAllConstant()->where('type', 'BOOKING_STATUS')->where('status', '1');
        $checkout_sequence = $booking_status->where('name', 'check_in')->first()->sequence ?? 0;
        $bookingColors = Constant::getAllConstant()->where('type', 'BOOKING_STATUS_COLOR');
        $statusList = [];
        $finalstatusList = [];

        foreach ($booking_status as $key => $value) {
            if ($value->name !== 'cancelled') {
                $statusList = [
                    'status' => $value->name,
                    'title' => $value->value,
                    'color_hex' => $bookingColors->where('sub_type', $value->name)->first()->name,
                    'is_disabled' => $value->sequence >= $checkout_sequence,
                ];
                array_push($finalstatusList, $statusList);
                $nextStatus = $booking_status->where('sequence', $value->sequence + 1)->first();
                if ($nextStatus) {
                    $statusList[$value->name]['next_status'] = $nextStatus->name;
                }
            } else {
                $statusList = [
                    'status' => $value->name,
                    'title' => $value->value,
                    'color_hex' => $bookingColors->where('sub_type', $value->name)->first()->name,
                    'is_disabled' => true,
                ];
                array_push($finalstatusList, $statusList);
            }
        }

        return response()->json([
            'status' => true,
            'data' => $finalstatusList,
            'message' => __('booking.booking_status_list'),
        ], 200);
    }

    public function bookingUpdate(Request $request)
    {

        $data = $request->all();
        $id = $request->id;
    
        // if (! empty($request->date)) {
        //     $data['start_date_time'] = $request->date;
        // }
        
        if (! empty($request->date) && ! empty($request->date)) {
            $data['start_date_time'] = date('Y-m-d h:i:m', strtotime($data['date'] . ' ' . $data['time']));
        }
        
        $bookingdata = Booking::find($id);

        $bookingdata->update($data);

        $booking = Booking::findOrFail($id);

        $booking->update($data);

        $bookingService = BookingService::where('booking_id', $booking->id)->get();

        $this->updateBookingService($bookingService, $booking->id);

        return response()->json([
            'status' => true,
            'message' => __('booking.booking_update'),
        ], 200);
    }
    
   public function getBookingTotal(Request $request)
    { 
        $amount = $request->sub_total;
        $time_slot = $request->time_slot;
        $booking = CommonHelper::getComissionBookingAmount($amount,$time_slot);
        $coupon = Coupon::where('code', $request->coupon_code)->first();
        $discounted_price = 0;
        $discount_amount = 0;
        if ($coupon) {
            $discountInfo = $this->calculateDiscount($booking['grantTotal'], $coupon);
            $discounted_price = $discountInfo['discounted_price'];
            $discount_amount = $discountInfo['discount_amount'];
            $booking['grantTotal'] = $discounted_price;
        }
        
        $sendTotal = [
            'sub_total' => $booking['subTotal'],
            'convience_fee' => $booking['convienceFee'],
            'tax' => $booking['tax'],
            'tax_amount' => $booking['taxAmount'],
            'grand_total' => $booking['grantTotal'],
            'additional_charge' => $booking['additionalCharge'],
            'discounted_price' => $discounted_price,
            'discount_type' => $coupon->type ?? '',
            'discount_value' => $coupon->value ?? null,
            'discount_amount' => $discount_amount,

            ];
        
        return response()->json([
            'status' => true,
            'data'   => $sendTotal,
            'message' => __('get booking amount'),
        ], 200);
    }
    private function calculateDiscount($amount, $coupon)
    {
        $discountedPrice = 0;
        $discountAmount = 0;

        if ($coupon->type === 'fixed') {
            $discountAmount = min($coupon->value, $amount); 
            $discountedPrice = max($amount - $discountAmount, 0);
        } elseif ($coupon->type === 'percent') {
            $discountAmount = min($amount * ($coupon->value / 100), $amount); 
            $discountedPrice = $amount - $discountAmount;
        }

        return [
            'discounted_price' => $discountedPrice,
            'discount_amount' => $discountAmount,
        ];
    }
    
   public function BookingVendorProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'booking_id' => 'required',
            'product' => 'required|array',
            'product.*.product_id' => 'required',
            'product.*.quantity' => 'required|numeric|min:1',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 201);
        }
    
        $bookingdata = Booking::find($request->booking_id);
    
        if (!$bookingdata) {
            return response()->json([
                'status' => false,
                'message' => __('Booking not found.'),
            ], 200);
        }
        
        // this is vendor
        $user = User::find($request->user_id);
        
        if (!$user) {
            return response()->json([
                    'status' => false,
                    'message' => __('Vendor not found.'),
                ], 200);
        }
    
        foreach ($request->product as $product) {
            if ($product['product_id'] == null || $product['quantity'] <= 0) {
                continue;
            }
    
            $data = [
                'user_id' => $request->user_id,
                'booking_id' => $request->booking_id,
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
            ];
    
            $orderIds = Order::where(['user_id' => $request->user_id, 'status' => 'confirmed'])->pluck('id');
    
            $orderProducts = OrderProduct::whereIn('order_id', $orderIds)->where('product_id', $product['product_id'])->get();
    
            foreach ($orderProducts as $orderProduct) {
                $quantityToUpdate = min($orderProduct->quantity, $product['quantity']);
                if ($quantityToUpdate==0) { continue; }
                $orderProduct->update(['quantity' => $orderProduct->quantity - $quantityToUpdate]);
                
                $product['quantity'] -= $quantityToUpdate;
    
                if ($product['quantity'] <= 0) {
                    break;
                }
            }
    
            $vendor_product = BookingVendorProduct::create($data);
            
        }
        
        if ($request->has('product_images')) {
            foreach ($request->product_images as $image) {
                $productImages = BookingVendorProduct::create([
                    'booking_id_img' => $request->booking_id,
                    'user_id' => $request->user_id,
                    'product_name' => $image['product_name'] ?? null
                ]);
        
                if (isset($image['image'])) {
                    $this->storeMedia($productImages, $image['image'], 'product_image');
                }
            }
        }
        
        // // Check commission earning
        // $commissionEarning = CommissionEarning::where('booking_id', $request->booking_id)->first();
        // if ($commissionEarning) {
        //     CommonHelper::checkCommission($request->booking_id, $request->user_id);
        // }
        
        if ($user) {
            $payment = BookingTransaction::where('booking_id', $request->booking_id)->first();
            
            if ($payment) {
                $commissionEarning = CommissionEarning::where('booking_id', $request->booking_id)->first();
        
                if ($commissionEarning) {
                    if ($payment->transaction_type == 'cash') {
                        $deductionAmount = $commissionEarning->grant_total - $commissionEarning->vendor_amount;
                        
                        // Deduct the amount from vendor's wallet
                        $user->wallet_amount = ($user->wallet_amount - $deductionAmount);
                        
                        // Recalculate wallet points
                        $user->wallet_point = CommonHelper::userPointConvert($user->wallet_amount);
                        
                        // Save vendor wallet changes
                        $user->save();
                        
                        $walletData = [
                            'user_id' => $user->id,
                            'type' => 'deduct' ,
                            'amount' => $deductionAmount
                            ];
                        WalletTransactions::create($walletData);
            
                        // Mark admin or vendor payment status as paid
                        $commissionEarning->admin_payment_status = 'paid';
                        $commissionEarning->vendor_payment_status = 'paid';
                    }
                    
                    // Mark service status as completed
                    $commissionEarning->service_status = 'completed';
                    
                    $commissionEarning->save();
                }
                
                $payment->payment_status = 1;
                $payment->save();
            } 
        }
    
     // Update booking status
        $bookingdata->status = 'checkout';
        $bookingdata->save();
    
        return response()->json([
            'status' => true,
            'message' => __('Checkout product uploaded successfully.'),
        ], 200);
    }
    
    // cancle vendor
    public function BookingVendorCancle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
            'booking_id' => 'required',
            
        ]);
    
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 200);
        }
    
        $bookingdata = Booking::find($request->booking_id);
    
        if (!$bookingdata) {
            return response()->json([
                'status' => false,
                'message' => __('Booking not found.'),
            ], 200);
        }
        
        // this is vendor
        $user = User::find($request->vendor_id);
        
        if (!$user) {
            return response()->json([
                    'status' => false,
                    'message' => __('Vendor not found.'),
                ], 200);
        }
    
        
           
    
            $data = [
                'vendor_id' => $request->vendor_id,
                'booking_id' => $request->booking_id,
                
            ];
    
            $vendor_product = BookingVendorCancle::create($data);
            
        
    
        
        return response()->json([
            'status' => true,
            'message' => __('Cancle successfully.'),
        ], 200);
    }


    
    private function storeMedia($model, $file, $collection)
    {
        $model->addMedia($file)->toMediaCollection($collection);
    }
    
    public function getBookingVendorProduct(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'booking_id' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 200);
        }
    
         $bookingVendorProduct = BookingVendorProduct::where('booking_id' , $request->booking_id)->with('product')->latest()->get();
         
        $bookingVendorProduct = $bookingVendorProduct->map(function($data){
            return [
                'id' => $data->id,
                'quantity' => $data->quantity,
                'booking_id' => $data->booking_id, 
                'product_image' => $data->product->feature_image ?? '',
                'product_name' => $data->product->name ?? '',
                'description' => $data->product->description ?? '',
                'created_at' => $data->created_at,
                'updated_at' => $data->updated_at
                ];
        });
        
         return response()->json([
                'status' => true,
                'data'   => $bookingVendorProduct ,
                'message' => __('Checkout product list.'),
            ], 200);
    }

}
