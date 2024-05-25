<?php

namespace App\Admin\Http\Requests\Page;

use App\Admin\Http\Requests\BaseRequest;

class PageRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'title' => ['required', 'string'],
            'content' => ['nullable'],
            'title_seo' => ['nullable'],
            'desc_seo' => ['nullable'],
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Page,id'],
            'title' => ['required', 'string'],
            'content' => ['nullable'],
            'title_seo' => ['nullable'],
            'desc_seo' => ['nullable'],
        ];
    }
}