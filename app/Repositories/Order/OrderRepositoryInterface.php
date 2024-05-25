<?php

namespace App\Repositories\Order;
use App\Admin\Repositories\EloquentRepositoryInterface;

interface OrderRepositoryInterface extends EloquentRepositoryInterface
{
	public function paginate(array $filter, array $relationCondition = [], array $relations = [], int $paginate = 10, array $sort = ['id', 'desc']);
    public function cancel($id);
}
