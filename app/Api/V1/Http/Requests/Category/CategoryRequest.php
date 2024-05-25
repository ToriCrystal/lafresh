<?php

namespace App\Api\V1\Http\Requests\Category;

use App\Api\V1\Http\Requests\BaseRequest;

class CategoryRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodGet()
    {
        return [
            'category_id' => ['required', 'exists:App\Models\Category,id']
        ];
    }
}