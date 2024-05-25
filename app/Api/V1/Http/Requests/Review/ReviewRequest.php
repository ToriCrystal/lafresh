<?php

namespace App\Api\V1\Http\Requests\Review;

use App\Api\V1\Http\Requests\BaseRequest;

class ReviewRequest extends BaseRequest
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
            'rating' => ['required', 'numeric', 'min:1', 'max:5'],
            'content' => ['nullable']
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodGet()
    {
        return [
            'product_id' => ['required', 'exists:App\Models\Product,id']
        ];
    }
}