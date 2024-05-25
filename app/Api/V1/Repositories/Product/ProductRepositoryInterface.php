<?php

namespace App\Api\V1\Repositories\Product;

use App\Admin\Repositories\Product\ProductRepositoryInterface as AdminProductRepositoryInterface;

interface ProductRepositoryInterface extends AdminProductRepositoryInterface
{
    public function getSearchByKeysWithRelations(array $data, array $relations = []);
    public function findOrFailWithRelations($id, array $relations = []);
    public function getByCategoriesWithRelations(array $categories_id = [], array $relations = []);
}