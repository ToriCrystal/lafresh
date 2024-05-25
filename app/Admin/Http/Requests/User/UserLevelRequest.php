<?php

namespace App\Admin\Http\Requests\User;

use App\Admin\Http\Requests\BaseRequest;
use App\Enums\User\UserLevelTypeDiscount;
use Illuminate\Validation\Rules\Enum;

class UserLevelRequest extends BaseRequest
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
            'type_discount' => ['required', new Enum(UserLevelTypeDiscount::class)],
            'min_amount' => ['required', 'numeric'],
            'plain_value' => ['required', 'numeric'],
            'position' => ['required', 'integer']
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\UserLevel,id'],
            'name' => ['required', 'string'],
            'type_discount' => ['required', new Enum(UserLevelTypeDiscount::class)],
            'min_amount' => ['required', 'numeric'],
            'plain_value' => ['required', 'numeric'],
            'position' => ['required', 'integer']
        ];
    }
}