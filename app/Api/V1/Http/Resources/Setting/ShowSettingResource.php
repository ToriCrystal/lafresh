<?php

namespace App\Api\V1\Http\Resources\Setting;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowSettingResource extends JsonResource
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
            'plain_value' => $this->isTypeImage() ? asset($this->plain_value) : $this->plain_value
        ];
    }
}
