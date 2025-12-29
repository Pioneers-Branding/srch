<?php

namespace Modules\ProductBooking\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'product_id' => $this->products->pluck('product_id'),
            'products' => $this->products,
            'user_id' => $this->user_id,
            'user_name' => optional($this->user)->full_name ?? default_user_name(),
            'user_profile_image' => optional($this->user)->profile_image ?? default_user_avatar(),
            'user_created' => optional($this->user)->created_at ?? '-',
            'status' => $this->status,
            'is_paid' => $this->payment->payment_status ?? 0,
            'created_by_name' => optional($this->createdUser)->full_name ?? default_user_name(),
            'updated_by_name' => optional($this->updatedUser)->full_name ?? default_user_name(),
            'created_at' => date('d, M Y', strtotime($this->created_at)),
            'updated_at' => date('d, M Y', strtotime($this->updated_at)),
            'payment' => $this->payment,
        ];
    }
}
