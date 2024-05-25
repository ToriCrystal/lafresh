<?php

namespace App\Admin\Http\Requests\Discount;

use App\Admin\Http\Requests\BaseRequest;
use Illuminate\Validation\Rules\Enum;

class DiscountRequest extends BaseRequest
{
    public function methodGet(){
        return [

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
            'product_id' => ['required', 'array'],
            'product_id.*' => ['required', 'exists:App\Models\Product,id'],
            'qty' => ['required', 'array'],
            'qty.*' => ['required', 'integer'],
            'qty_donate' => ['required', 'array'],
            'qty_donate.*' => ['required', 'integer'],    
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\DiscountSeller,id'],
            'product_id' => ['required'],    
            'qty' => ['required', 'integer'],   
            'qty_donate' => ['required', 'integer'], 
        ];
        
    }
}