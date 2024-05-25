<?php

namespace App\View\Composers\Product;

use Illuminate\View\View;

class ProductComposer
{
    protected $repoProduct;

    public function __construct()
    {
        $this->repoProduct = app()->make('App\Repositories\Product\ProductRepositoryInterface');
    }

    public function compose(View $view)
    {
        $products = $this->repoProduct->getAll();
        $view->with('products', $products);
    }

}