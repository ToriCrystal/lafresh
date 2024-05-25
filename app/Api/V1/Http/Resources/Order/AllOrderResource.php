<?php

namespace App\Api\V1\Http\Resources\Order;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AllOrderResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function($order){
            $data = [
                'id' => $order->id,
                'total' => $order->total,
                'status' => $order->status,
                'created_at' => $order->created_at,
                'product' => new ShowOrderDetailResource($order->details[0])
            ];
            return $data;      
        });
    }
}
