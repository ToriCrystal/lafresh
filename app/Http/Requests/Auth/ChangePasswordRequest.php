<?php

namespace App\Http\Requests\Auth;

use App\Admin\Http\Requests\BaseRequest;

class ChangePasswordRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    protected function methodPut()
    {
        return [
            'old_password' => ['current_password'],
            'password' => ['required', 'string', 'max:255', 'confirmed'],
        ];
    }
}
