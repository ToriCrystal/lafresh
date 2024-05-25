<?php

namespace App\Admin\Http\Requests\Post;

use App\Admin\Http\Requests\BaseRequest;
use App\Enums\Post\PostStatus;
use Illuminate\Validation\Rules\Enum;

class PostRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'categories_id' => ['required', 'array'],
            'categories_id.*' => ['required', 'exists:App\Models\Category,id'],
            'title' => ['required', 'string'],
            'feature_image' => ['required'],
            'status' => ['required', new Enum(PostStatus::class)],
            'excerpt' => ['nullable'],
            'content' => ['nullable'],
            'title_seo' => ['nullable'],
            'desc_seo' => ['nullable'],
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Post,id'],
            'categories_id' => ['required', 'array'],
            'categories_id.*' => ['required', 'exists:App\Models\Category,id'],
            'title' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'feature_image' => ['required'],
            'status' => ['required', new Enum(PostStatus::class)],
            'excerpt' => ['nullable'],
            'content' => ['nullable'],
            'title_seo' => ['nullable'],
            'desc_seo' => ['nullable'],
        ];
    }
}