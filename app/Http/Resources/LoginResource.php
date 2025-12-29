<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'gender' => $this->gender,
            'user_role' => $this->getRoleNames() ?? [],
            'api_token' => $this->api_token,
            'profile_image' => $this->avatar,
            'login_type' => $this->login_type,
            'otp' => $this->otp,
            'profile_image' => $this->media->pluck('original_url')->first(),
            'username' => $this->username,
            'password' => $this->password,
            'status' => $this->status,
            'player_id' => $this->player_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'uid' => null,
            'social_image' => null,
            'wallet_amount' => $this->wallet_amount,
            'wallet_point' => $this->wallet_point,

        ];
    }
}
