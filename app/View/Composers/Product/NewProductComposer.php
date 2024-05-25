<?php

namespace App\View\Composers\Product;

use Illuminate\View\View;

class NewProductComposer
{
    protected $repoProduct;

    public function __construct()
    {
        $this->repoProduct = app()->make('App\Repositories\Product\ProductRepositoryInterface');
    }

    public function compose(View $view)
    {
        $products = $this->repoProduct->getQueryBuilderOrderBy()->limit(5)->get();

        $view->with('products', $products);
    }
}
