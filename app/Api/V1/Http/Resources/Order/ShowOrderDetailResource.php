<?php

namespace App\Api\V1\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowOrderDetailResource extends JsonResource
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
            'id' => $this->detail['product']['id'],
            'name' => $this->detail['product']['name'],
            'qty' => $this->qty,
            'unit_price' => $this->unit_price,
            'unit_price_purchase_qty' => $this->unit_price_purchase_qty,
            'slug' => $this->detail['product']['slug'],
            'feature_image' => asset($this->detail['product']['feature_image'])
        ];
        return $data;
    }
}
