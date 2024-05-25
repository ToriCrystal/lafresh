<?php

namespace App\Http\Requests\Auth;

use App\Admin\Http\Requests\BaseRequest;

class LoginRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'phone' => 'required',
            'password' => 'required'
        ];
    }
}
