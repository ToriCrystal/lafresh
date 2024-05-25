<?php

namespace App\Admin\Http\Requests\ProductCategory;

use App\Admin\Http\Requests\BaseRequest;
use App\Admin\Rules\ProductCategory\ProductCategoryParent;
use App\Enums\ProductCategory\ProductCategoryShowHome;
use App\Enums\ProductCategory\ProductCategoryStatus;
use Illuminate\Validation\Rules\Enum;

class ProductCategoryRequest extends BaseRequest
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
            'parent_id' => ['nullable', 'exists:App\Models\ProductCategory,id'],
            'position' => ['required', 'integer'],
            'status' => ['required', new Enum(ProductCategoryStatus::class)],
            'show_home' => ['required', new Enum(ProductCategoryShowHome::class)],
            'avatar' => ['required'],
            'icon' => ['nullable'],
            'product.title_seo' => ['nullable'],
            'product.desc_seo' => ['nullable']
            
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\ProductCategory,id'],
            'name' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'parent_id' => ['nullable', 'exists:App\Models\ProductCategory,id', new ProductCategoryParent($this->id)],
            'position' => ['nullable', 'integer'],
            'status' => ['required', new Enum(ProductCategoryStatus::class)],
            'show_home' => ['required', new Enum(ProductCategoryShowHome::class)],
            'avatar' => ['required'],
            'icon' => ['nullable'],
            'admin_id' => ['nullable', 'array'],
            'admin_id.*' => ['nullable', 'exists:App\Models\Admin,id'],
            'product.title_seo' => ['nullable'],
            'product.desc_seo' => ['nullable']
        ];
    }
}