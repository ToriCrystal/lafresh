<?php

namespace App\Repositories\Order;

use App\Admin\Repositories\Order\OrderRepository as AdminOrderRepository;
use App\Enums\Order\OrderStatus;
use App\Repositories\Order\OrderRepositoryInterface;

class OrderRepository extends AdminOrderRepository implements OrderRepositoryInterface
{
    public function paginate(array $filter, array $relationCondition = [], array $relations = [], int $paginate = 10, array $sort = ['id', 'desc'])
    {

        $this->getQueryBuilder();

        $this->applyFilters($filter);

        foreach ($relationCondition as $relation => $condition) {
            $this->instance = $this->instance->whereHas($relation, $condition);
        }

        return $this->instance->with($relations)->orderBy(...$sort)->paginate($paginate);
    }

    public function cancel($id)
    {

        $this->find($id);

        $this->authorize('update');

        if ($this->instance && $this->instance->isCancel()) {

            $this->instance->update([
                'status' => OrderStatus::Cancelled
            ]);
            return $this->instance;
        }

        return false;
    }
}
