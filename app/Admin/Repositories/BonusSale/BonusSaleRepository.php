<?php

namespace App\Admin\Repositories\BonusSale;

use App\Admin\Repositories\BonusSale\BonusSaleRepositoryInterface;
use App\Admin\Repositories\EloquentRepository;
use App\Models\BonusSale;

class BonusSaleRepository extends EloquentRepository implements BonusSaleRepositoryInterface
{
    public function getModel()
    {
        return BonusSale::class;
    }

    public function getQueryBuilderWithRelations(array $filter, $comparison = '=', $relations = [])
    {
        $this->getQueryBuilderOrderBy();

        foreach($filter as $key => $value){
            $this->instance = $this->instance->where($key, $comparison, $value);
        }

        if (!empty($relations)) {
            $this->instance = $this->instance->with($relations);
        }
        return $this->instance;
    }

    public function getQueryBuilderOrderBy($column = 'created_at', $sort = 'DESC')
    {
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }

}
