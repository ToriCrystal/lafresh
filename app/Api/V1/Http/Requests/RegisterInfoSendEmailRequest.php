<?php

namespace App\Api\V1\Http\Requests;

use App\Api\V1\Http\Requests\BaseRequest;

class RegisterInfoSendEmailRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'fullname' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
            'address' => ['required', 'string'],
            'message' => ['nullable']
        ];
    }
}