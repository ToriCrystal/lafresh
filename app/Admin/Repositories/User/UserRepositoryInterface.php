<?php

namespace App\Admin\Repositories\User;

use App\Admin\Repositories\EloquentRepositoryInterface;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
	public function count();
	public function findLevel($id);
	public function findOrFailWithRelations($id, $relations = []);
	public function getAllTotalAmountOrder($id);
	public function searchAllLimit($value = '', $meta = [], $select = [], $limit = 10);
	public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');

	public function getUnitQtyInTheAgent($perPage = 10);
}
