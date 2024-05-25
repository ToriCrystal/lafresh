<?php

namespace App\Repositories\ShoppingCart;

use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\ShoppingCart\ShoppingCartRepository as AdminShoppingCartRepository;
use App\Models\ShoppingCart;
use App\Repositories\ShoppingCart\ShoppingCartRepositoryInterface;

class ShoppingCartRepository extends EloquentRepository implements ShoppingCartRepositoryInterface
{

    public function getModel()
    {
        return ShoppingCart::class;
    }


    public function getTotalPrice()
    {
        $sellingPrices = $this->model->pluck('price_selling');
        return $sellingPrices->toArray();
    }


    public function clear()
    {
        $this->model->truncate();
    }

    public function getItems()
    {
        return $this->model->all()->toArray();
    }

}
