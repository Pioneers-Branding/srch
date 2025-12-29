<?php

namespace Modules\ProductBooking\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderListResource extends JsonResource
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
            'address_line_1' => $this->address->address_line_1 ?? '',
            'address_line_2' => $this->address->address_line_2 ?? '',
            'pincode' => $this->address->postal_code ?? '',
            'address' => $this->address->address ?? '',
            'products' => $this->order_product->map(function ($order_product) {
            
                $order_product['product_name'] = !empty($order_product['product']->name) ? $order_product['product']->name : '';
                $order_product['product_image'] = $order_product['product']->feature_image ?? '-';
                unset($order_product['product']);

                return $order_product;
            }),
            'user_id' => $this->user_id,
            'user_name' => optional($this->user)->full_name ?? default_user_name(),
            'user_profile_image' => optional($this->user)->profile_image ?? default_user_avatar(),
            'user_created' => optional($this->user)->created_at,
            'status' => $this->status,
            'created_by_name' => optional($this->createdUser)->full_name ?? default_user_name(),
            'updated_by_name' => optional($this->updatedUser)->full_name ?? default_user_name(),
            'created_at' => date('D, M Y', strtotime($this->created_at)),
            'updated_at' => date('D, M Y', strtotime($this->updated_at)),
        ];
    }
}
