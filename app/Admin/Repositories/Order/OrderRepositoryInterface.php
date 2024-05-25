<?php

namespace App\Admin\Repositories\Order;
use App\Admin\Repositories\EloquentRepositoryInterface;

interface OrderRepositoryInterface extends EloquentRepositoryInterface
{
	public function chartCountEveryDay(array $dateBetween);
	public function chartRevenue(array $dateBetween);
	public function totalRevenue();
	public function findOrFailWithRelations($id, array $relations = ['orderDetails', 'user']);
	public function getQueryBuilderWithRelations($relations = ['user']);
}