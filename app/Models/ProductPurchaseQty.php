<?php

namespace App\Models;

use App\Enums\Product\ProductPurchaseQtyType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPurchaseQty extends Model
{
    use HasFactory;

    protected $table = 'product_purchase_qty';
    protected $guarded = [];

    protected $casts = [
        'type' => ProductPurchaseQtyType::class
    ];

    public function typeAmount(){
        return $this->type == ProductPurchaseQtyType::Amount;
    }
}
