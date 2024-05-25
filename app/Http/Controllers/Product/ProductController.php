<?php

namespace App\Http\Controllers\Product;

use App\Admin\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $repoAttributeVariation;
    public function __construct(
        ProductRepositoryInterface $repository,
    ) {
        parent::__construct();
        $this->repository = $repository;
    }

    public function getView()
    {
        return [
            'index' => 'public.products.index',
            'show' => 'public.products.show',
            'search' => 'public.products.searchs.product-result',
            'detail' => 'public.carts.detail-cart',
        ];
    }

    public function getRoute()
    {
        return [];
    }


    public function detail()
    {

        return view($this->view['detail']);
    }


    public function index(Request $request)
    {

        $breadcrums = [['label' => trans('Sản phẩm')]];

        $products = $this->repository->paginate([]);

        return view($this->view['index'], compact('breadcrums', 'products'));
    }

    public function show($slug)
    {

        $product = $this->repository->view(['slug' => $slug], []);
        $breadcrums = [
            ['label' => trans('product'), 'url' => route('product.index')],
            ['label' => $product->name],
        ];

        $related = $this->repository->getByLimit([
            ['id', '!=', $product->id]
        ], [
            'categories' => fn ($q) => $q->whereIn('id', $product->categories->pluck('id')->toArray())
        ], [], 5);
        $qty = $product->discountSeller->first()->qty ?? 0;
        $qty_donate = $product->discountSeller->first()->qty_donate ?? 0;
        return view($this->view['show'], compact('product', 'breadcrums', 'related', 'qty', 'qty_donate'));
    }

    public function search(Request $request)
    {
        $products = $this->repository->getByLimit([['name', 'Like', '%' . $request->get('keyword', '') . '%']], [], [], 10);
        return view($this->view['search'], compact('products'));
    }
}
