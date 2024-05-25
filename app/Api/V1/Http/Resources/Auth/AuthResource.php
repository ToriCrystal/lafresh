<?php

namespace App\Api\V1\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'username' => $this->username,
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'birthday' => $this->birthday,
            'gender' => $this->gender,
            'avatar' => asset($this->avatar),
            'address' => $this->address,
            'created_at' => $this->created_at,
        ];
        if($this->level){
            $data['level'] = [
                'name' => $this->level->name,
                'type_discount' => $this->level->type_discount,
                'plain_value' => $this->level->plain_value
            ];
        }
        return $data;
    }
}
