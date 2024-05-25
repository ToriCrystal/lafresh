<?php

namespace App\Api\V1\Http\Requests\Order;

use App\Api\V1\Http\Requests\BaseRequest;
use App\Enums\Order\OrderPaymentMethod;
use App\Enums\Order\OrderStatus;
use Illuminate\Validation\Rules\Enum;

class OrderRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodGet()
    {
        return [
            'status' => ['nullable', new Enum(OrderStatus::class)]
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'customer_fullname' => ['required', 'string'],
            'customer_phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
            'customer_email' => ['required', 'email'],
            'shipping_address' => ['required'],
            'payment_method' => ['required', new Enum(OrderPaymentMethod::class)],
            'note' => ['nullable']
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
            'id' => ['required', 'exists:App\Models\Order,id']
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodDelete()
    {
        return [

        ];
    }
}