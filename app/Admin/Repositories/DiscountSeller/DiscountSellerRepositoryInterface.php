<?php

namespace App\Admin\Repositories\DiscountSeller;
use App\Admin\Repositories\EloquentRepositoryInterface;
use App\Models\DiscountSeller;

interface DiscountSellerRepositoryInterface extends EloquentRepositoryInterface
{
    public function getQueryBuilderWithRelations($relations = ['product']);
}