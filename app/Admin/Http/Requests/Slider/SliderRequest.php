<?php

namespace App\Admin\Http\Requests\Slider;

use App\Admin\Http\Requests\BaseRequest;
use App\Enums\Slider\SliderStatus;
use Illuminate\Validation\Rules\Enum;

class SliderRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'status' => ['required', new Enum(SliderStatus::class)],
            'name' => ['required', 'string'],
            'plain_key' => ['required', 'string', 'unique:App\Models\Slider,plain_key'],
            'desc' => ['nullable'],
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Slider,id'],
            'status' => ['required', new Enum(SliderStatus::class)],
            'name' => ['required', 'string'],
            'plain_key' => ['required', 'string', 'unique:App\Models\Slider,plain_key,'.$this->id],
            'desc' => ['nullable'],
        ];
    }
}