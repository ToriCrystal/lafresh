<?php

namespace App\View\Composers\Cart;




use Illuminate\View\View;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\ShoppingCart\ShoppingCartRepositoryInterface;

class CartComposer{
    protected $repoProduct;
    protected $repository;

    public function __construct(ShoppingCartRepositoryInterface $repository, ProductRepositoryInterface $repoProduct)
    {
        $this->repository = $repository;
        $this->repoProduct = $repoProduct;
    }

    public function compose(View $view)
    {
        $data = $this->repository->getAll();
        $productId = $data->pluck('product_id')->toArray();
        $product = $this->repoProduct->find($productId);
        $totalProduct = count($product);
        $quantity = $data->pluck('quantity');
        $price = $data->pluck('price_selling');
        $totalPrice = $price->sum();
        $totalQuantity = $quantity->sum();
        $id = $data->pluck('id');
        $stt = 1;
        $view->with([
            'pr' => $product,
            'sl' => $quantity,
            'price' => $price,
            'id' => $id,
            'totalPrice' => $totalPrice,
            'stt' => $stt,
            'totalSl' => $totalQuantity,
            'totalProduct' => $totalProduct
        ]);
    }



}
