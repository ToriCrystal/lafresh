<?php

namespace App\Admin\Repositories\BonusSale;
use App\Admin\Repositories\EloquentRepositoryInterface;

interface BonusSaleRepositoryInterface extends EloquentRepositoryInterface
{
    public function getQueryBuilderWithRelations(array $filter, $comparison = '=', $relations = []);
}
