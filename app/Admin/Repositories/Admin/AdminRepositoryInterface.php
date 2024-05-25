<?php

namespace App\Admin\Repositories\Admin;

use App\Admin\Repositories\EloquentRepositoryInterface;

interface AdminRepositoryInterface extends EloquentRepositoryInterface
{
    public function searchAllLimit($value = '', $meta = [], $select = [], $limit = 10);
	
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');
    public function getQueryBuilderOrderByFollow();
}