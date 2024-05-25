<?php

namespace App\Admin\Http\Requests\Menu;

use App\Admin\Http\Requests\BaseRequest;
use App\Enums\DefaultStatus;
use App\Models\Category;
use App\Models\Page;
use App\Models\PostCategory;
use App\Models\ProductCategory;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rule;

class MenuRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'name' => ['required', 'string', 'max:191'],
            'status' => ['required', new Enum(DefaultStatus::class, false)]
        ];
    }

    protected function methodPut()
    {
        return [
            'menu.id' => ['required', 'exists:App\Models\Menu,id'],
            'menu.name' => ['required', 'string', 'max:191'],
            'menu.status' => ['required',  new Enum(DefaultStatus::class, false)],
            'locations' => ['nullable', 'array'],
            'locations.*' => ['nullable', Rule::in(array_keys(config('custom.menu.locations')))],
            'json_menu_items' => ['nullable', 'json'],
            'title' => ['nullable', 'array'],
            'title.*' => ['nullable', 'string'],
            'reference_type' => ['nullable', 'array'],
            'reference_type.*' => ['nullable', Rule::in([ProductCategory::class, PostCategory::class, Page::class])],
            'reference_id' => ['nullable', 'array'],
            'url' => ['nullable', 'array'],
        ];
    }
}
