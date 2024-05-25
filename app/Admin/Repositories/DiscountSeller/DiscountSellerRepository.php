<?php

namespace App\Admin\Repositories\DiscountSeller;

use App\Admin\Repositories\DiscountSeller\DiscountSellerRepositoryInterface;
use App\Admin\Repositories\EloquentRepository;
use App\Models\DiscountSeller;

class DiscountSellerRepository extends EloquentRepository implements DiscountSellerRepositoryInterface
{
    public function getModel()
    {
        return DiscountSeller::class;
    }

    public function getQueryBuilderWithRelations($relations = ['product']){
        $this->getQueryBuilder();
        $this->instance = $this->instance->with($relations)->orderBy('product_id', 'desc');
        return $this->instance;
    }
}
