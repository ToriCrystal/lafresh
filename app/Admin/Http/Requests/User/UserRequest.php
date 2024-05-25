<?php

namespace App\Admin\Http\Requests\User;

use App\Admin\Http\Requests\BaseRequest;
use Illuminate\Validation\Rules\Enum;
use App\Enums\User\{UserVip, UserGender, UserRoles};
use Illuminate\Validation\Rule;

class UserRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            // 'username' => [
            //     'required',
            //     'required',
            //     'string', 'min:6', 'max:50',
            //     'unique:App\Models\User,username',
            //     'unique:App\Models\User,username',
            //     'regex:/^[A-Za-z0-9_-]+$/',
            //     function ($attribute, $value, $fail) {
            //         if (in_array(strtolower($value), ['admin', 'user', 'password'])) {
            //             $fail('The ' . $attribute . ' cannot be a common keyword.');
            //             $fail('The ' . $attribute . ' cannot be a common keyword.');
            //         }
            //     },
            // ],
            'avatar' => ['required'],
            'fullname' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:App\Models\User,email'],
            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/', 'unique:App\Models\User,phone'],
            //             'gender' => ['null', new Enum(UserGender::class)],
            'password' => ['required', 'string', 'confirmed'],
            'birthday' => ['required', 'date_format:Y-m-d'],
            'roles' => ['nullable', new Enum(UserRoles::class)]
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\User,id'],
            // 'username' => [
            //     'required',
            //     'required',
            //     'string', 'min:6', 'max:50',
            //     'unique:App\Models\User,username,' . $this->id,
            //     'unique:App\Models\User,username,' . $this->id,
            //     'regex:/^[A-Za-z0-9_-]+$/',
            //     function ($attribute, $value, $fail) {
            //         if (in_array(strtolower($value), ['admin', 'user', 'password'])) {
            //             $fail('The ' . $attribute . ' cannot be a common keyword.');
            //             $fail('The ' . $attribute . ' cannot be a common keyword.');
            //         }
            //     },
            // ],
            'avatar' => ['required'],
            'fullname' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:App\Models\User,email,' . $this->id],
            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/', 'unique:App\Models\User,phone,' . $this->id],
            // 'gender' => ['required', new Enum(UserGender::class)],
            'email' => ['required', 'email', 'unique:App\Models\User,email,' . $this->id],
            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/', 'unique:App\Models\User,phone,' . $this->id],
            'password' => ['nullable', 'string', 'confirmed'],
            'birthday' => ['required', 'date_format:Y-m-d'],
            'roles' => ['required', new Enum(UserRoles::class)],
        ];
    }
}
