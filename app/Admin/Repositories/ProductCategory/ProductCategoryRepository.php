<?php

namespace App\Admin\Repositories\ProductCategory;

use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\EloquentStandardRepository;
use App\Admin\Repositories\ProductCategory\ProductCategoryRepositoryInterface;
use App\Models\ProductCategory;

class ProductCategoryRepository extends EloquentStandardRepository implements ProductCategoryRepositoryInterface
{

    protected $select = [];

    public function getModel()
    {
        return ProductCategory::class;
    }
    public function findOrFailWithRelations($id, array $relations = ['admins'])
    {
        $this->findOrFail($id);
        $this->instance = $this->instance->load($relations);
        return $this->instance;
    }
    public function getFlatTreeNotInNode(array $nodeId)
    {
        $this->getQueryBuilderOrderBy('position', 'ASC');
        $this->instance = $this->instance->whereNotIn('id', $nodeId)
            ->withDepth()
            ->get()
            ->toFlatTree();
        return $this->instance;
    }
    public function getFlatTree()
    {
        $this->getQueryBuilderOrderBy('position', 'ASC');
        $this->instance = $this->instance->withDepth()
            ->get()
            ->toFlatTree();
        return $this->instance;
    }

    public function updateAndPermission($id, $data = [], $admin_ids = [])
    {
        $this->update($id, $data);
        $this->instance->admins()->sync($admin_ids);
        return $this->instance;
    }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC')
    {
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }
}
