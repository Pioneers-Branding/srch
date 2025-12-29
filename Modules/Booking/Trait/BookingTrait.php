<?php

namespace Modules\Booking\Trait;

use App\Jobs\BulkNotification;
use Modules\Booking\Models\BookingService;
use Modules\BussinessHour\Models\BussinessHour;
use App\Helpers\CommonHelper;
use Modules\Commission\Models\CommissionEarning;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

trait BookingTrait
{
    public function updateBookingService($data, $booking_id , $time=null)
    {
        $serviceData = collect($data);
        $serviceId = $serviceData->pluck('service_id')->toArray();
        $bookingService = BookingService::where('booking_id', $booking_id);
        if (count($serviceId) > 0) {
            $bookingService = $bookingService->whereNotIn('service_id', $serviceId);
        }
        $bookingService->delete();
        
        // dd($serviceData);
        $amount = 0;
        foreach ($serviceData as $key => $value) {
            $createBooking = BookingService::updateOrCreate(['booking_id' => $booking_id, 'service_id' => $value['service_id'] ], [
                'sequance' => $key,
                'start_date_time' => $value['start_date_time'],
                'booking_id' => $booking_id,
                'service_id' => $value['service_id'],
                'quantity' => !empty($value['quantity']) ?  $value['quantity'] : 0,
                // 'employee_id' => $value['employee_id'],
                'service_price' => $value['service_price'] ?? 0,
                'duration_min' => $value['duration_min'] ?? 30,
                'temp' => json_encode($serviceData)
            ]);
            
            if ($createBooking) {
                $qty = !empty($value['quantity']) ?  $value['quantity'] : 0;
                $price = !empty($value['service_price']) ?  $value['service_price'] : 0;
                $amount +=  ($price * $qty);
            }
        }
        
        $res = CommonHelper::getComissionBookingAmount($amount , $time);
        
        if ($res) {

            $commission = [
                        'booking_id' => $booking_id, 
                        'commissionable_id' => $booking_id,
                        'admin_amount' => $res['adminAmount'], 
                        'vendor_amount' => $res['vendorAmount'],
                        'tax_amount' => $res['taxAmount'],
                        'tax' => $res['tax'],
                        'convience_fee' => $res['convienceFee'],
                        'sub_total' => $res['subTotal'],
                        'grant_total' => $res['grantTotal'],
                        'additional_charge' => $res['additionalCharge']
                    ]; 
            CommissionEarning::create($commission);
        }
        
        return true;
    }
     public function updateBookingProduct($booking_id, $user_id)
    {
       $cartItems = DB::table('cart')->where('user_id', Auth::id())->get();
     foreach ($cartItems as $item) {
        
     $productPrice = DB::table('shop_products')->where('id', $item->product_id)->value('default_price');

        
        DB::table('booking_services')->insert([
            'booking_id' => $booking_id, 
            'product_id' => $item->product_id, 
            'quantity' => $item->quantity,
            'service_price' => $productPrice, 
        ]);
        
        DB::table('cart')->where('id', $item->id)->delete();
        
    }
        
        return true;
    }

    public function getSlots($date, $day, $branch_id, $employee_id = null)
    {
        $slotDay = BussinessHour::where(['day' => strtolower($day), 'branch_id' => $branch_id])->first();

        $slots[] = [
            'value' => '',
            'label' => 'No Slot Available',
            'disabled' => true,
        ];

        if (isset($slotDay)) {
            $start_time = strtotime($slotDay->start_time);
            $end_time = strtotime($slotDay->end_time);
            $slot_duration = setting('slot_duration');

            $slot_parts = explode(':', $slot_duration);
            $slot_hours = intval($slot_parts[0]);
            $slot_minutes = intval($slot_parts[1]);

            $slot_duration_minutes = $slot_hours * 60 + $slot_minutes;

            $current_time = $start_time;
            $slots = [];

            while ($current_time < $end_time) {
                // Skip slots that overlap with break hours
                $is_break_hour = false;
                foreach ($slotDay->breaks as $break) {
                    $start_break = strtotime($break['start_break']);
                    $end_break = strtotime($break['end_break']);
                    if ($current_time >= $start_break && $current_time < $end_break) {
                        $current_time = $end_break;
                        $is_break_hour = true;
                        break;
                    }
                }

                if ($is_break_hour) {
                    continue; // Skip this iteration and proceed to the next slot
                }

                $slot_start = $current_time;
                $current_time += $slot_duration_minutes * 60;

                $startDateTime = date('Y-m-d', strtotime($date)).' '.date('H:i:s', $slot_start);
                $startTimestamp = strtotime($startDateTime);

                $endTimestamp = $startTimestamp + ($slot_duration_minutes * 60);

                // Check if the slot overlaps with any existing appointments
                $is_booked = false;
                if ($employee_id) {
                    $existingAppointments = BookingService::where('employee_id', $employee_id)
                        ->where('start_date_time', '<', date('Y-m-d H:i:s', $endTimestamp))
                        ->get();

                    foreach ($existingAppointments as $appointment) {
                        $appointment_start = strtotime($appointment->start_date_time);
                        $appointment_end = $appointment_start + ($appointment->duration_min * 60);

                        if ($startTimestamp >= $appointment_start && $startTimestamp < $appointment_end) {
                            $is_booked = true;
                            break;
                        }
                    }
                }

                if (! $is_booked) {
                    $slot = [
                        'value' => date('Y-m-d H:i:s', $startTimestamp),
                        'label' => date('h:i A', $slot_start),
                        'disabled' => false,
                    ];
                    $slots[] = $slot;
                }
            }
        }

        return $slots;
    }

    protected function sendNotificationOnBookingUpdate($type, $booking)
    {
        $data = mail_footer($type, $booking);

        $address = [
            'address_line_1' => $booking->address->address_line_1 ?? '',
            'address_line_2' => $booking->address->address_line_2 ?? '',
            'city' => $booking->address->city ?? '',
            'state' => $booking->address->state ?? '',
            'country' => $booking->address->country ?? '',
            'postal_code' => $booking->address->postal_code ?? '',
        ];

        $data['booking'] = [
            'id' => $booking->id,
            'description' => $booking->note ?? 'Testing Note',
            'user_id' => $booking->user_id,
            'user_name' => optional($booking->user)->full_name ?? default_user_name(),
            'employee_id' => !empty($booking->branch->employee->id) ? $booking->branch->employee->id : '',
            'vendor_id' => !empty($booking->vendor_id) ? $booking->vendor_id : '',
            'vendor_ids' => !empty($booking->vendor_ids) ? $booking->vendor_ids : '',
            'employee_name' => $booking->services->first()->employee->full_name ?? 'Staff',
            'booking_date' => date('d/m/Y', strtotime($booking->start_date_time)),
            'booking_time' => date('h:i A', strtotime($booking->start_date_time)),
            'booking_services_names' => implode(', ', $booking->mainServices->pluck('name')->toArray()),
            'booking_duration' => $booking->services->sum('duration_min') ?? 0,
            'venue_address' => implode(', ', $address),
        ];

        BulkNotification::dispatch($data);
    }
}
