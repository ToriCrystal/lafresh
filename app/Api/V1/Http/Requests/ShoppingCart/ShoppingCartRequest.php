<?php

namespace App\Api\V1\Http\Requests\ShoppingCart;

use App\Api\V1\Http\Requests\BaseRequest;
use App\Api\V1\Rules\CheckCompatibleTwoArray;

class ShoppingCartRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'product_id' => ['required', 'array'],
            'product_id.*' => ['required', 'exists:App\Models\Product,id'],
            'qty' => ['required', 'array'],
            'qty.*' => ['required', 'integer', 'min:1']
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPut()
    {
        return [
            'id' => ['required', 'array', new CheckCompatibleTwoArray($this->qty)],
            'id.*' => ['required', 'exists:App\Models\ShoppingCart,id'],
            'qty' => ['required', 'array'],
            'qty.*' => ['required', 'integer', 'min:0'],
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodDelete()
    {
        return [
            'id' => ['required', 'array'],
            'id.*' => ['required', 'exists:App\Models\ShoppingCart,id'],
        ];
    }
}