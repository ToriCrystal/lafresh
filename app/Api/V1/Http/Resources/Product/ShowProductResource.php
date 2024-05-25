<?php

namespace App\Api\V1\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowProductResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'sku' => $this->sku,
            'in_stock' => $this->in_stock,
            'feature' => $this->feature,
            'new' => $this->new,
            'feature_image' => asset($this->feature_image),
            'gallery' => $this->gallery ? array_map(function($value){
                return asset($value);
            }, $this->gallery->toArray()) : [],
            'short_desc' => $this->short_desc,
            'content_specification' => $this->content_specification,
            'content_application' => $this->content_application,
            'content_download' => $this->content_download,
            'brochure' => $this->brochure,
            'datasheet' => $this->datasheet,
            'user_manual' => $this->user_manual,
            'desc' => $this->desc,
            'title_seo' => $this->title_seo,
            'desc_seo' => $this->desc_seo,
            'price' => $this->price,
            'viewed' => $this->viewed,
        ];
        if($this->price_promotion){
            $data['price_promotion'] = $this->price_promotion;
        }
        if($this->purchaseQty){
            foreach($this->purchaseQty as $item){
                $data['purchase_qty'][] = [
                    'type' => $item->type,
                    'qty' => $item->qty,
                    'plain_value' => $item->plain_value
                ];
            }
        }
        return $data;
    }
}
