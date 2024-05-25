<?php

namespace App\Admin\Repositories\DiscountAgent;
use App\Admin\Repositories\EloquentRepositoryInterface;
use App\Models\DiscountAgent;

interface DiscountAgentRepositoryInterface extends EloquentRepositoryInterface
{
    public function findLevel($level);
}