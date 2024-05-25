<?php

namespace App\Api\V1\Http\Requests\Product;

use App\Api\V1\Http\Requests\BaseRequest;

class ProductWishlistRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'product_id' => ['required', 'exists:App\Models\Product,id'],
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodGet()
    {
        if($this->routeIs('api.v1.product.show')){
            return [
                'id' => ['required', 'exists:App\Models\Product,id']
            ];
        }elseif($this->routeIs('api.v1.product.index') || $this->routeIs('api.v1.product.auth.index')){
            return [
                'keywords' => ['nullable', 'string'],
                'feature' => ['nullable', new Enum(ProductFeature::class)],
                'new' => ['nullable', new Enum(ProductNew::class)],
            ];
        }
    }
}