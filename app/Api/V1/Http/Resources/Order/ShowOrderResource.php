<?php

namespace App\Api\V1\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowOrderResource extends JsonResource
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
            'customer_fullname' => $this->customer_fullname,
            'customer_phone' => $this->customer_phone,
            'customer_email' => $this->customer_email,
            'shipping_address' => $this->shipping_address,
            'sub_total' => $this->sub_total,
            'discount' => $this->discount,
            'total' => $this->total,
            'status' => $this->status,
            'payment_method' => $this->payment_method,
            'shipping_method' => $this->shipping_method,
            'note' => $this->note,
            'created_at' => $this->created_at,
            'details' => $this->details->map(function($detail){
                return new ShowOrderDetailResource($detail);
            })
        ];
        return $data;
    }
}
