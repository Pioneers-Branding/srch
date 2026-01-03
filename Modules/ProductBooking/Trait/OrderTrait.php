<?php

namespace Modules\ProductBooking\Trait;

use App\Jobs\BulkNotification;
use Modules\ProductBooking\Models\OrderProduct;
use Modules\ShopProduct\Models\ShopProduct;
use Modules\ProductBooking\Models\Cart;
use Modules\BussinessHour\Models\BussinessHour;

trait OrderTrait
{
    public function updateOrderProduct($data, $order_id, $user_id)
    {
        $productData = collect($data);
        $productId = $productData->pluck('product_id')->toArray();
        $OrderProduct = OrderProduct::where('order_id', $order_id);
        if (count($productId) > 0) {
            $OrderProduct->whereNotIn('product_id', $productId);
        }
        $OrderProduct->delete();

        foreach ($productData as $key => $value) {
            $product = ShopProduct::find($value['product_id']);

            if ($product) {
                OrderProduct::updateOrCreate(
                    ['order_id' => $order_id, 'product_id' => $value['product_id']],
                    [
                        'sequance' => $key,
                        'order_id' => $order_id,
                        'product_id' => $value['product_id'],
                        'price' => $product->default_price ?? 0,
                        'quantity' => $value['quantity'] ?? 1,
                    ]
                );
            }

            Cart::where(['user_id' => $user_id, 'product_id' => $value['product_id']])->delete();
        }
    }

    public function getSlots($date, $day, $branch_id, $employee_id = null)
    {
        $slots = [];

        $slotDay = BussinessHour::where(['day' => strtolower($day), 'branch_id' => $branch_id])->first();

        if ($slotDay) {
            $start_time = strtotime($slotDay->start_time);
            $end_time = strtotime($slotDay->end_time);
            $slot_duration = setting('slot_duration');

            $slot_parts = explode(':', $slot_duration);
            $slot_hours = intval($slot_parts[0]);
            $slot_minutes = intval($slot_parts[1]);

            $slot_duration_minutes = $slot_hours * 60 + $slot_minutes;

            $current_time = $start_time;

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

                $startDateTime = date('Y-m-d', strtotime($date)) . ' ' . date('H:i:s', $slot_start);
                $startTimestamp = strtotime($startDateTime);

                $endTimestamp = $startTimestamp + ($slot_duration_minutes * 60);

                // Check if the slot overlaps with any existing appointments
                $is_booked = false;
                if ($employee_id) {
                    $existingAppointments = OrderProduct::where('employee_id', $employee_id)
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

                if (!$is_booked) {
                    $slots[] = [
                        'value' => date('Y-m-d H:i:s', $startTimestamp),
                        'label' => date('h:i A', $slot_start),
                        'disabled' => false,
                    ];
                }
            }
        } else {
            $slots[] = [
                'value' => '',
                'label' => 'No Slot Available',
                'disabled' => true,
            ];
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
            'postal_code' => $booking->address->postcode ?? '',
        ];

        $data['booking'] = [
            'id' => $booking->id,
            'description' => $booking->note ?? '',
            'user_id' => $booking->user_id,
            'user_name' => optional($booking->user)->full_name ?? default_user_name(),
            'employee_id' => '',
            'employee_name' => 'Staff',
            'booking_date' => date('d/m/Y', strtotime($booking->start_date_time ?? $booking->created_at)),
            'booking_time' => date('h:i A', strtotime($booking->start_date_time ?? $booking->created_at)),
            'booking_services_names' => implode(', ', $booking->mainProducts->pluck('name')->toArray()),
            'booking_duration' => 0,
            'venue_address' => implode(', ', array_filter($address)),
        ];

        BulkNotification::dispatch($data);
    }
}
