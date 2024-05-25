<?php

namespace App\Admin\Repositories\User;

use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\EloquentStandardRepository;
use App\Admin\Repositories\User\UserRepositoryInterface;
use App\Enums\Product\ProductUnit;
use App\Enums\User\UserRoles;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository extends EloquentStandardRepository implements UserRepositoryInterface
{

    public function getModel()
    {
        return User::class;
    }

    public function count()
    {
        return $this->model->count();
    }

    public function findLevel($id)
    {
        $this->findOrFail($id);
        $this->instance = $this->instance->load('level');
        return $this->instance->level;
    }

    public function findOrFailWithRelations($id, $relations = [])
    {
        $this->findOrFail($id);
        if (!empty($relations)) {
            $this->instance = $this->instance->load($relations);
        }
        return $this->instance;
    }
    public function getAllTotalAmountOrder($id)
    {
        $this->instance = $this->model->where('id', $id)->withSum('orders', 'total')->first();
        return $this->instance->orders_sum_total;
    }

    public function searchAllLimit($keySearch = '', $meta = [], $select = ['id', 'fullname', 'phone'], $limit = 10)
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
            return $query->where('fullname', 'LIKE', '%' . $key . '%')
                ->orWhere('phone', 'LIKE', '%' . $key . '%')
                ->orWhere('email', 'LIKE', '%' . $key . '%')
                ->orWhere('fullname', 'LIKE', '%' . $key . '%');
        });
    }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC')
    {
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }

    public function getUnitQtyInTheAgent($perPage = 10)
    {
        $agent_orders = $this->getByQueryBuilder(['roles' => UserRoles::Agent], ['orders', 'orders.details']);

        $results = [];

        foreach ($agent_orders as $value) {

            if ($value->orders->isNotEmpty()) {

                $filtered_orders = $value->orders()
                    ->whereYear('created_at', '=', now()->year)
                    ->whereMonth('created_at', '=', now()->month)
                    ->get();

                $results[] = [
                    'user' => $value,
                    'total_qty_pail' => $this->totalQtyByUnit($filtered_orders, ProductUnit::Pail),
                    'total_qty_bottle' => $this->totalQtyByUnit($filtered_orders, ProductUnit::Bottle),
                ];
            }
        }

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentResults = array_slice($results, ($currentPage - 1) * $perPage, $perPage);

        $paginatedResults = new LengthAwarePaginator($currentResults, count($results), $perPage);
        $paginatedResults->setPath(url()->current());

        return $paginatedResults;
    }

    public function totalQtyByUnit($filtered_orders, $value)
    {
        return $filtered_orders->flatMap(function ($order) use ($value) {
            return $order->details->where('unit', $value)->pluck('qty');
        })->sum();
    }
}
