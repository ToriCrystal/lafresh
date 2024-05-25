<?php

namespace App\Admin\Http\Controllers\ProductCategory;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\ProductCategory\ProductCategoryRequest;
use App\Admin\Repositories\ProductCategory\ProductCategoryRepositoryInterface;
use App\Admin\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Admin\DataTables\ProductCategory\ProductCategoryDataTable;
use App\Enums\ProductCategory\ProductCategoryShowHome;
use App\Enums\ProductCategory\ProductCategoryStatus;

class ProductCategoryController extends Controller
{
    public function __construct(
        ProductCategoryRepositoryInterface $repository, 
        ProductCategoryServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;
        
        $this->service = $service;
        
    }

    public function getView(){
        return [
            'index' => 'admin.product_categories.index',
            'create' => 'admin.product_categories.create',
            'edit' => 'admin.product_categories.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.product_category.index',
            'create' => 'admin.product_category.create',
            'edit' => 'admin.product_category.edit',
            'delete' => 'admin.product_category.delete'
        ];
    }
    public function index(ProductCategoryDataTable $dataTable){
        return $dataTable->render($this->view['index'], [
            'status' => ProductCategoryStatus::asSelectArray()
        ]);
    }

    public function create(){
        $productCategories = $this->repository->getFlatTree();
        return view($this->view['create'], [
            'product_categories' => $productCategories,
            'status' => ProductCategoryStatus::asSelectArray(),
            'show_home' => ProductCategoryShowHome::asSelectArray()
        ]);
    }

    public function store(ProductCategoryRequest $request){

        $instance = $this->service->store($request);

        return to_route($this->route['edit'], $instance->id);

    }

    public function edit($id){
        $productCategories = $this->repository->getFlatTreeNotInNode([$id]);
        $productCategory = $this->repository->findOrFailWithRelations($id);

        return view(
            $this->view['edit'], [
                'product_category' => $productCategory,
                'product_categories' => $productCategories,
                'status' => ProductCategoryStatus::asSelectArray(),
                'show_home' => ProductCategoryShowHome::asSelectArray()
            ]
        );
    }

    public function update(ProductCategoryRequest $request){

        $this->service->update($request);

        return back()->with('success', __('notifySuccess'));

    }

    public function delete($id){

        $this->service->delete($id);
        
        return to_route($this->route['index'])->with('success', __('notifySuccess'));
        
    }
}