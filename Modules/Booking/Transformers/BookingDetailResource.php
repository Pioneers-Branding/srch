<?php

namespace Modules\Booking\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Employee\Models\EmployeeRating;
use Modules\Employee\Transformers\EmployeeReviewResource;

class BookingDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'note' => $this->note,
            'start_date_time' => $this->start_date_time,
            'branch_id' => $this->branch_id,
            'branch_name' => $this->address->address ?? ( $this->address->address_line_1 ?? '' ) . ' '. ( $this->address->address_line_2 ?? '') ,
            'address_line_1' => $this->address->address_line_1 ?? '',
            'address_line_2' => $this->address->address_line_2 ?? '',
            'pincode' => $this->address->postal_code ?? '',
            'latitude' => $this->address->latitude ?? '',
            'longitude' => $this->address->longitude ?? '',
            'phone' => $this->user->mobile ?? null,
            'vendor_phone' => $this->vendor->mobile ?? null, 
            'vendor_name' => $this->vendor->full_name ?? null, 
            'vendor_earning' => isset($this->commissionBooking->vendor_payment_status) && $this->commissionBooking->vendor_payment_status=='paid' ? $this->commissionBooking->vendor_amount: null,  
            'vendor_profile_image' => optional($this->vendor)->profile_image ?? default_user_avatar(),
            'employee_id' => $this->services->first()->employee->id ?? null,
            'employee_name' => $this->services->first()->employee->full_name ?? default_user_name(), 
            'employee_image' => $this->services->first()->employee->profile_image ?? default_user_avatar(),
            'services' => $this->booking_service->map(function ($booking_service) {
                unset($booking_service['employee']);

                $booking_service['service_name'] = $booking_service['service']->name;
                $booking_service['service_image'] = $booking_service['service']->feature_image ?? '-';
                unset($booking_service['service']);

                return $booking_service;
            }),
            'user_id' => $this->user_id,
            'user_name' => optional($this->user)->full_name ?? default_user_name(),
            'user_profile_image' => optional($this->user)->profile_image ?? default_user_avatar(),
            'user_created' => optional($this->user)->created_at ?? '-',
            'status' => $this->status,
            'created_by_name' => optional($this->createdUser)->full_name ?? default_user_name(),
            'updated_by_name' => optional($this->updatedUser)->full_name ?? default_user_name(),
            'created_at' => date('D, M Y', strtotime($this->created_at)),
            'updated_at' => date('D, M Y', strtotime($this->updated_at)),
            'customer_review' => new EmployeeReviewResource(EmployeeRating::where('user_id', auth()->user()->id)->where('employee_id', $this->services->first()->employee_id ?? 0)->first()),
            'discount' => $this->discount_percentage,
            'tip' => ! empty($this->tip) ? $this->tip->top_amount : 0,
            'payment' => $this->payment,
            'sub_total' => $this->commissionBooking->sub_total ?? 0,
            'convience_fee' => $this->commissionBooking->convience_fee ?? 0,
            'tax' => $this->commissionBooking->tax ?? 0,
            'tax_amount' => $this->commissionBooking->tax_amount ?? 0,
            'additional_charge' => $this->commissionBooking->additional_charge ?? 0,
            'grand_total' => $this->commissionBooking->grant_total ?? 0,
            
        ];
    }
}
