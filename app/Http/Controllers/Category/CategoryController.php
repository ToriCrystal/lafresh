<?php

namespace App\Http\Controllers\Category;

use App\Admin\Http\Controllers\Controller;
use App\Api\V1\Repositories\ProductCategory\ProductCategoryRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $repoProduct;
    protected $repository;

    public function __construct(
        ProductRepositoryInterface $repoProduct,
        ProductCategoryRepositoryInterface $repository,
    ) {
        parent::__construct();

        $this->repoProduct = $repoProduct;
        $this->repository = $repository;
    }

    public function getView()
    {
        return [
            'show' => 'public.products.index',
        ];
    }

    public function getRoute()
    {
        return [];
    }

    public function show($slug)
    {

        $category = $this->repository->findByOrFail(['slug' => $slug]);

        $products = $this->repoProduct->paginate([], [
            'categories' => fn ($q) => $q->where('id', $category->id)
        ]);

        $breadcrums = [
            ['label' => $category->name]
        ];


        return view($this->view['show'], compact('products', 'breadcrums'));
    }
}
