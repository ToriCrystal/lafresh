<?php

namespace App\Http\Requests\Auth;

use App\Admin\Http\Requests\BaseRequest;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Validation\ValidationException;

class ResetPasswordRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    protected function methodGet()
    {
        return [
            'code' => ['required', 'exists:App\Models\User,code'],
            'token' => ['required', 'exists:App\Models\User,token_get_password']
        ];
    }

    protected function methodPost()
    {
        return [
            'email' => ['required', 'exists:App\Models\User,email']
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    protected function methodPut()
    {
        return [
            'code' => ['required', 'exists:App\Models\User,code'],
            'token' => ['required', 'exists:App\Models\User,token_get_password'],
            'password' => ['required', 'string', 'confirmed'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->routeIs('reset_password.edit')) {
            throw new NotFoundHttpException('Not Found', null, 404);
        }
        throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
