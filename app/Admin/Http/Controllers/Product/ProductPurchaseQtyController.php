<?php

namespace App\Admin\Http\Controllers\Product;

use App\Admin\Http\Controllers\Controller;
use App\Enums\Product\ProductPurchaseQtyType;

class ProductPurchaseQtyController extends Controller
{
    public function getView(){
        return [
            'create' => 'admin.products.data.partials.loop-purchase-qty'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.product.index',
            'create' => 'admin.product.create',
            'edit' => 'admin.product.edit',
            'delete' => 'admin.product.delete'
        ];
    }

    public function create(){
        $product_purchase_qty_type = ProductPurchaseQtyType::asSelectArray();
        return view($this->view['create'], compact('product_purchase_qty_type'));
    }
}