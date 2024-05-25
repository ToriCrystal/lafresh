<?php

namespace App\Models;

use App\Enums\Product\ProductUnit;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';

    protected $guarded = [];

    protected $casts = [
        'detail' => AsArrayObject::class,
        'unit' => ProductUnit::class
    ];

    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }

}
