<?php

namespace App\Admin\Http\Requests\Category;

use App\Admin\Http\Requests\BaseRequest;
use App\Enums\Category\CategoryStatus;
use App\Admin\Rules\Category\CategoryParent;
use Illuminate\Validation\Rules\Enum;

class CategoryRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'name' => ['required', 'string'],
            'parent_id' => ['nullable', 'exists:App\Models\Category,id'],
            'position' => ['required', 'integer'],
            'status' => ['required', new Enum(CategoryStatus::class)],
            'title_seo' => ['nullable'],
            'desc_seo' => ['nullable'],
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Category,id'],
            'name' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'parent_id' => ['nullable', 'exists:App\Models\Category,id', new CategoryParent($this->id)],
            'position' => ['nullable', 'integer'],
            'status' => ['required', new Enum(CategoryStatus::class)],
            'title_seo' => ['nullable'],
            'desc_seo' => ['nullable'],
        ];
    }
}