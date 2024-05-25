<?php

namespace App\Api\V1\Http\Resources\Product;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AllProductResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function($product) {
            $data = [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'in_stock' => $product->in_stock,
                'feature' => $product->feature,
                'new' => $product->new,
                'feature_image' => asset($product->feature_image),
                'price' => $product->price,
                'viewed' => $product->viewed,
                'short_desc' => $product->short_desc
            ];

            if($product->price_promotion){
                $data['price_promotion'] = $product->price_promotion;
            }

            return $data;
        });
    }
}
