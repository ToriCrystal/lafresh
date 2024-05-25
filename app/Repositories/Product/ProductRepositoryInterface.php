<?php

namespace App\Repositories\Product;

use App\Admin\Repositories\EloquentStandardRepositoryInterface;

interface ProductRepositoryInterface extends EloquentStandardRepositoryInterface
{
    public function view(array $filter, array $relations = []);
    public function getUnitById($productId);
    public function paginate(array $filter, array $relationCondition = [], array $relations = [], int $paginate = 10);
    public function getByLimit(array $filter, array $filterRelation = [], array $relations = [], int $limit = 10, array $sort = ['id', 'asc']);
}
