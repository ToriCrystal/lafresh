<?php


namespace App\Http\Requests\Order;

use App\Enums\User\UserRoles;
use Illuminate\Validation\Rules\Enum;
use App\Admin\Http\Requests\BaseRequest;
use App\Enums\Order\OrderShippingMethod;


class OrderRequest extends BaseRequest{





    public function methodPost(){
        return [
            'customer_fullname' => ['required', 'string'],
            'customer_email' => ['required', 'email'],
            'customer_phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
            'shipping_address' => ['required'],
            'shipping_method' => ['required'],
            'note' => ['nullable'],
        ];
    }


}


