<?php

namespace App\Admin\Repositories\BonusPolicyDetail;
use App\Admin\Repositories\EloquentRepositoryInterface;

interface BonusPolicyDetailRepositoryInterface extends EloquentRepositoryInterface
{
    public function latest($condition);
}