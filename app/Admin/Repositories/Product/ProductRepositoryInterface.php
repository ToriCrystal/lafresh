<?php

namespace App\Admin\Repositories\Product;
use App\Admin\Repositories\EloquentStandardRepositoryInterface;
use App\Models\Product;

interface ProductRepositoryInterface extends EloquentStandardRepositoryInterface
{
    public function updateMultipleByIds(array $ids, array $data);
    public function findOrFailWithRelations($id, array $relations = []);
    public function updateWithAllRelations(array $product,array $purchase_qty = [], array $categories_id = []);
    public function createWithAllRelations(array $product,array $purchase_qty = [], array $categories_id = []);

    public function getByIdsAndOrderByIds(array $ids);
    public function getByColumnsWithRelationsLimit(array $data, array $relations = [], $limit = 10);

    public function getAllByColumns(array $data);

    public function loadRelations(Product $product, array $relations = []);

    public function attachCategories(Product $product, array $categoriesId);

    public function syncCategories(Product $product, array $categoriesId);
	
    public function getQueryBuilderHasPermissionWithRelations($relations = ['categories']);

    public function getQueryBuilderWithRelations($relations = ['categories']);

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');

    public function searchAllLimit($keySearch = '', $meta = [], $select = ['id', 'name'], $limit = 10);


}