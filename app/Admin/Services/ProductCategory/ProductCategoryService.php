<?php

namespace App\Admin\Services\ProductCategory;

use App\Admin\Services\ProductCategory\ProductCategoryServiceInterface;
use  App\Admin\Repositories\ProductCategory\ProductCategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Admin\Traits\Setup;

class ProductCategoryService implements ProductCategoryServiceInterface
{
    use Setup;
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;
    
    protected $repository;

    public function __construct(ProductCategoryRepositoryInterface $repository){
        $this->repository = $repository;
    }
    
    public function store(Request $request){
        $this->data = $request->validated();
        return $this->repository->create($this->data);
    }

    public function update(Request $request){
        $this->data = $request->validated();
        $admin_ids = $this->data['admin_id'] ?? [];
        unset($this->data['admin_id']);
        return $this->repository->updateAndPermission($this->data['id'], $this->data, $admin_ids);
    }

    public function delete($id){
        return $this->repository->delete($id);

    }

}