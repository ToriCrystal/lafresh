<?php

namespace App\Http\Requests\Auth;

use App\Admin\Http\Requests\BaseRequest;
use App\Enums\User\UserGender;
use App\Enums\User\UserRoles;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'fullname' => ['required', 'string'],
            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/', 'unique:App\Models\User,phone'],
            'email' => ['required', 'email', 'unique:App\Models\User,email'],
            'gender' => ['nullable', UserGender::asSelectArray()],
            'roles' => ['required', UserRoles::asSelectArray()],
            'password' => ['required', 'string', 'confirmed'],
            'birthday' => ['required', 'date_format:Y-m-d'],
            'agree' => ['required']
        ];
    }
}
