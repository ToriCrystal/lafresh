<?php

namespace App\Admin\Repositories\ProductCategory;
use App\Admin\Repositories\EloquentRepositoryInterface;

interface ProductCategoryRepositoryInterface extends EloquentRepositoryInterface
{
    public function findOrFailWithRelations($id, array $relations = ['admins']);

    public function updateAndPermission($id, $data = [], $admin_ids = []);

    public function getFlatTreeNotInNode(array $nodeId);
    
    public function getFlatTree();
	
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');

}