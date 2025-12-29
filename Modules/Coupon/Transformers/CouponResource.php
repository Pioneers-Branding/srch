<?php

namespace Modules\Coupon\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
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
            'name' => $this->title,
            'code'=>$this->code,
            'type' => $this->type,
            'percent' => $this->value,
        ];
    }
}
