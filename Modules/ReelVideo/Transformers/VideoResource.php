<?php

namespace Modules\ReelVideo\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
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
            'id'              => $this->id,
            'status'          => $this->status,
            'video'           => $this->video,
            'thumbnail_image' => $this->thumbnail,
            'title'           => $this->name,
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
            
        ];
    }
}
