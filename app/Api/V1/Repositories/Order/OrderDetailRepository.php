<?php

namespace App\Api\V1\Repositories\Order;
use App\Admin\Repositories\Order\OrderDetailRepository as AdminOrderDetailRepository;
use App\Api\V1\Repositories\Order\OrderDetailRepositoryInterface;

class OrderDetailRepository extends AdminOrderDetailRepository implements OrderDetailRepositoryInterface
{

}