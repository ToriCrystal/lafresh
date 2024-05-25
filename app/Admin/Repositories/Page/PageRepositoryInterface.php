<?php

namespace App\Admin\Repositories\Page;
use App\Admin\Repositories\EloquentRepositoryInterface;

interface PageRepositoryInterface extends EloquentRepositoryInterface
{
	public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');
}