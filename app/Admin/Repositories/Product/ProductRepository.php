<?php

namespace App\Admin\Repositories\Product;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\EloquentStandardRepository;
use App\Admin\Repositories\Product\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository extends EloquentStandardRepository implements ProductRepositoryInterface
{
    public function getModel(){
        return Product::class;
    }
    public function updateMultipleByIds(array $ids, array $data){
        $this->instance = $this->model->whereIn('id', $ids)->update($data);
        return $this->instance;
    }

    public function findOrFailWithRelations($id, array $relations = []){
        $this->findOrFail($id);
        if($relations){
            $this->instance = $this->instance->load($relations);
        }
        return $this->instance;
    }
    public function updateWithAllRelations(array $product, array $purchase_qty = [], array $categories_id = []){
        $this->instance = $this->update($product['id'], $product);
        if(!empty($categories_id)){
            $this->syncCategories($this->instance, $categories_id);
        }
        
        $this->instance->purchaseQty()->delete();

        if(!empty($purchase_qty)){
            $this->instance->purchaseQty()->createMany($purchase_qty);
        }
        return $this->instance;
    }
    
    public function createWithAllRelations(array $product, array $purchase_qty = [], array $categories_id = []){
        $this->instance = $this->create($product);
        if(!empty($categories_id)){
            $this->attachCategories($this->instance, $categories_id);
        }
        if(!empty($purchase_qty)){
            $this->instance->purchaseQty()->createMany($purchase_qty);
        }
        return $this->instance;
    }

    public function getByIdsAndOrderByIds(array $ids, $relations = []){
        $this->instance = $this->model
        ->whereIn('id', $ids);
        
        if(!empty($relations)){
            $this->instance = $this->instance->with($relations);
        }

        $this->instance = $this->instance->orderByRaw(DB::raw("FIELD(id, " . implode(',', $ids) . ")"))
        ->get();

        return $this->instance;
    }

    public function getAllByColumns(array $data){
        $this->getQueryBuilder();
        foreach($data as $key => $value){
            if($key == 'name'){
                $this->instance = $this->instance->where($key, 'like', "%{$value}%");
            }else{
                $this->instance = $this->instance->where($key, $value);
            }
        }
        $this->instance = $this->instance->get();
        return $this->instance;
    }
    public function getByColumnsWithRelationsLimit(array $data, array $relations = [], $limit = 10){
        $this->getQueryBuilderWithRelations($relations);

        foreach($data as $key => $value){
            if($key == 'name'){
                $this->instance = $this->instance->where($key, 'like', "%{$value}%");
            }else{
                $this->instance = $this->instance->where($key, $value);
            }
        }

        $this->instance = $this->instance->limit($limit)->get();
        return $this->instance;
    }

    public function attachCategories(Product $product, array $categoriesId){
        return $product->categories()->attach($categoriesId);
    }

    public function syncCategories(Product $product, array $categoriesId){
        return $product->categories()->sync($categoriesId);
    }
    // public function findOrFail($id)
    // {
    //     $this->instance = $this->model->findOrFail($id);
        
    //     $this->authorize('view', 'admin');

    //     return $this->instance;
    // }
    public function loadRelations(Product $product, array $relations = []){
        return $product->load($relations);
    }
    public function getQueryBuilderHasPermissionWithRelations($relations = ['categories']){
        $this->getQueryBuilderWithRelations($relations);
        $admin = auth('admin')->user();
        if(!$admin->isSuperAdmin() && !$admin->isAdmin()){
            $pCatIds = $admin->productCategories()->pluck('id');
            $this->instance = $this->instance->whereHas('categories', function($q) use ($pCatIds){
                return $q->whereIn('id', $pCatIds);
            });
        }
        return $this->instance;
    }

    public function getQueryBuilderWithRelations($relations = ['categories']){
        $this->getQueryBuilderOrderBy();
        if(!empty($relations)){
            $this->instance = $this->instance->with($relations);
        }
        return $this->instance;
    }
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC'){
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }

    public function searchAllLimit($keySearch = '', $meta = [], $select = ['id', 'name'], $limit = 10)
    {
        $this->instance = $this->model->select($select);
        $this->getQueryBuilderFindByKey($keySearch);

        foreach ($meta as $key => $value) {
            $this->instance = $this->instance->where($key, $value);
        }
        return $this->instance->limit($limit)->get();
    }

    
    protected function getQueryBuilderFindByKey($key)
    {
        $this->instance = $this->instance->where(function ($query) use ($key) {
            return $query->where('name', 'LIKE', '%' . $key . '%');
        });
    }
}