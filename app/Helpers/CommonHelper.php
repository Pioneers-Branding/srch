<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use App\Models\Address;
use Modules\Booking\Models\Booking;
use Modules\Commission\Models\CommissionEarning;
use Modules\Booking\Models\BookingTransaction;
use DB;
use Carbon\Carbon;

class CommonHelper
{

    public static function sendOtp($mobile, $otp, $name = "")
    {
        $key = env('SMS_API_KEY');
        $message_content = urlencode("Dear Customer $name is your OTP $otp -AdServs");
        $senderid = env('SMS_SENDER_ID');
    
        $url = "https://sms.adservs.co.in/vb/apikey.php?apikey=$key&senderid=$senderid&number=$mobile&message=$message_content";
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        
        // print_r($output);
        // die();
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            return false;
        }
        curl_close($ch);
    
        return true;
    }
    
    // message sent
    
    function sendMessage($mobile, $message) {
    // Replace with your actual API key and sender ID
    $apiKey = 'your_api_key';
    $senderId = 'your_sender_id';

    // URL encode the message content
    $messageContent = urlencode($message);

    // Construct the URL
    $url = "http://sms.adservs.co.in/vb/apikey.php?apikey=$apiKey&senderid=$senderId&number=$mobile&message=$messageContent";

    // Initialize cURL session
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL session
    $output = curl_exec($ch);

    // Check for errors
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        return ['success' => false, 'error' => $error_msg];
    }

    // Close cURL session
    curl_close($ch);

    // Return success
    return ['success' => true, 'response' => $output];
}


    
    public static function userPointConvert($amount)
    {
        $pointCost = 10;
        
        return ($amount/$pointCost);
    }
    
    public static function getComissionBookingAmount($amount , $slot_time=null)
    {
        $convienceOne = 49;
        $convienceTwo = 69;
        $adminComission = 0;
        $convienceFee = 0;
        $vendorAmount = 0;
        $tax = 18;
        $grantTotal = 0;
        $additionalAmount = 70;
        $additionalCharge = 0;
    
        if ($amount >= 0 && $amount <= 500) {
            $adminComission = 15; 
            $convienceFee = $convienceOne;
        } elseif ($amount > 500 && $amount <= 750) {
            $adminComission = 20;
            $convienceFee = $convienceOne;
        } elseif ($amount > 750 && $amount <= 1000) {
            $adminComission = 22;
            $convienceFee = $convienceTwo;
        } elseif ($amount > 1000) {
            $adminComission = 25;
            $convienceFee = $convienceTwo;
        }
        
        $adminAmount = ($adminComission * $amount) / 100;
        $vendorAmount = $amount - $adminAmount; 
        
        $totalAmount = $amount + $convienceFee; 
        $taxAmount = ($tax * $totalAmount) / 100;
        $grantTotal = $totalAmount + $taxAmount;
        
        if ($slot_time) {
            $morningStartTime = "07:30:00";
            $morningEndTime = "09:30:00";
            $eveningStartTime = "19:30:00";
            $eveningEndTime = "21:30:00";
    
            $slotTime = Carbon::parse($slot_time);
            if ($slotTime->between(Carbon::createFromTimeString($morningStartTime), Carbon::createFromTimeString($morningEndTime)) || 
                $slotTime->between(Carbon::createFromTimeString($eveningStartTime), Carbon::createFromTimeString($eveningEndTime))) {
                $grantTotal += $additionalAmount;
                $additionalCharge = $additionalAmount;
            }
        }
        
        $response = [      
            'subTotal' => $amount,
            'grantTotal' => $grantTotal,
            'taxAmount' => $taxAmount,
            'vendorAmount' => $vendorAmount,
            'adminAmount' => $adminAmount,
            'convienceFee' => $convienceFee,
            'tax' => $tax,
            'additionalCharge' => $additionalCharge
        ];
      
        return $response;
    }

   public static function checkCommission($booking_id, $vendor_id = '')
   {
        $commissionEarning = CommissionEarning::where('booking_id', $booking_id)->first();
        $bookingTransaction = BookingTransaction::where('booking_id', $booking_id)->first();
    
        if ($commissionEarning && $bookingTransaction) {
            if ($bookingTransaction->transaction_type == 'cash') {
                $commissionEarning->admin_payment_status = 'paid';
            } 
                $commissionEarning->vendor_payment_status = 'paid';
         
            if ($vendor_id) {
                $user = User::find($vendor_id);
    
                if ($user) {
                    $user->wallet_amount += $commissionEarning->vendor_amount;
                    $user->wallet_point = self::userPointConvert($user->wallet_amount);
                    $user->save();
                }
            }
    
            $commissionEarning->save();
        }
    }
    
    public static function createRazorpayOrder($apiKey, $apiSecret, $amount, $currency, $receipt, $notes) {
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.razorpay.com/v1/orders',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => json_encode(array(
            "amount" => $amount,
            "currency" => $currency,
            "receipt" => $receipt,
            "notes" => $notes
          )),
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Basic ' . base64_encode($apiKey . ':' . $apiSecret)
          ),
        ));
    
        $response = curl_exec($curl);
    
        curl_close($curl);
        
        return $response;
    }
    
    public static function sendVoiceRequest($account, $pin, $campaignid, $msisdn, $agent) {
        $url = "https://voice.httpapi.zone/voiceapi/c2c.php";
        $params = array(
            'account' => $account,
            'pin' => $pin,
            'campaignid' => $campaignid,
            'msisdn' => $msisdn,
            'agent' => $agent
        );
    
        $queryString = http_build_query($params);
        $fullUrl = $url . '?' . $queryString;
    
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
            CURLOPT_URL => $fullUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
    
        $response = curl_exec($curl);
    
        curl_close($curl);
    
        return $response;
    }
    
    public static function getVendorsByLatLong($lat , $long){
        $latitude =  $lat/* latitude of the reference point */;
        $longitude = $long/* longitude of the reference point */;
        $radius = 10; // Radius in kilometers
        
        $vendors = User::select('id', DB::raw("(6371 * acos(cos(radians($latitude)) * cos(radians(latitude)) * cos(radians(longitude) - radians($longitude)) + sin(radians($latitude)) * sin(radians(latitude)))) AS distance"))
            ->having('distance', '<', $radius)
            ->where('is_manager' , 1)
            ->orderBy('distance')
            ->pluck('id')->toArray();
            
        $vendorsArray = User::select('id')->where('is_manager', 1)->pluck('id')->toArray();
    
// $vendors = User::select('id', DB::raw("(6371 * acos(cos(radians($latitude)) * cos(radians(latitude)) * cos(radians(longitude) - radians($longitude)) + sin(radians($latitude)) * sin(radians(latitude)))) AS distance"))
//     ->whereRaw("(6371 * acos(cos(radians($latitude)) * cos(radians(latitude)) * cos(radians(longitude) - radians($longitude)) + sin(radians($latitude)) * sin(radians(latitude)))) < $radius")
//     ->where('is_manager', 1)
//     ->orderBy('distance')
//     ->pluck('id')->toArray();


        
        return $vendorsArray;
    }
}
