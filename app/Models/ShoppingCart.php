<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $guarded = [];

    public function scopeCurrentAuth($query){
        return $query->where('user_id', auth()->user()->id);
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
