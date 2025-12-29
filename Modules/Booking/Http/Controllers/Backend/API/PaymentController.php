<?php
namespace App\Helpers;
namespace Modules\Booking\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Booking\Models\Booking;
use Modules\Currency\Models\Currency;
use Modules\Booking\Models\BookingTransaction;
use Modules\Booking\Trait\PaymentTrait;
use Modules\Commission\Models\CommissionEarning;
use Modules\Tip\Models\TipEarning;
use App\Helpers\CommonHelper;

class PaymentController extends Controller
{
    use PaymentTrait;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Payment';
    }

    public function savePayment(Request $request)
    {
        $data = $request->all();
        $data['tip_amount'] = $data['tip'] ?? 0;
        $data['payment_status'] = ($data['transaction_type'] !== 'cash') ? 1 : 0;

        $booking = Booking::where('id', $data['booking_id'])->first();
    
        $payment = BookingTransaction::create($data);
        
        $commissionEarning = CommissionEarning::where('booking_id', $data['booking_id'])->first();

        if ($commissionEarning && $data['transaction_type'] !== 'cash') {
            $commissionEarning->admin_payment_status = 'paid';
            $commissionEarning->save();
        }

        $message = __('booking.payment_done');

        return response()->json(['message' => $message, 'status' => true], 200);
    }
    
    public function RazorpayOrderCreate(Request $request)
    {
        
        $currencyCode = Currency::Where('is_primary', '1')->first();
        
         
        $apiKey = env('RAZORPAY_API_KEY');
        $apiSecret = env('RAZORPAY_API_SECRETID');
        $amount = $request->amount*100;
        $currency = $currencyCode->currency_code ?? 'INR' ;
        $receipt = 'Receipt no. 1';
        $notes = array(
            "notes_key_1" => "Tea, Earl Grey, Hot",
            "notes_key_2" => "Tea, Earl Grey… decaf."
        );
        
        $orderResponse = CommonHelper::createRazorpayOrder($apiKey, $apiSecret, $amount, $currency, $receipt, $notes);
        $orderResponse = json_decode($orderResponse, true);
        return response()->json(['data' => $orderResponse, 'status' => true], 200);
        
        // echo $orderResponse;
    }
    
    
}
