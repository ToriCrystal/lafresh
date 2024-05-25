<?php

namespace App\Api\V1\Repositories\ShoppingCart;
use App\Admin\Repositories\EloquentRepositoryInterface;

interface ShoppingCartRepositoryInterface extends EloquentRepositoryInterface
{
	public function getAuthCurrent();
	public function updateOrCreate($compare, $data);
	public function updateMultiple(array $ids, array $qty);
	public function deleteAllCurrentAuth();
	public function deleteMultiple(array $ids);
}