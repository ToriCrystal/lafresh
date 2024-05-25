<?php

namespace App\Repositories\Order;
use App\Admin\Repositories\Order\OrderDetailRepository as AdminOrderDetailRepository;
use App\Repositories\Order\OrderDetailRepositoryInterface;

class OrderDetailRepository extends AdminOrderDetailRepository implements OrderDetailRepositoryInterface
{

}