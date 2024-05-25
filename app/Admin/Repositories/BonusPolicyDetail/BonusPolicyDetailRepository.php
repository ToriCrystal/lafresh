<?php

namespace App\Admin\Repositories\BonusPolicyDetail;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\BonusPolicyDetail\BonusPolicyDetailRepositoryInterface;
use App\Models\BonusPolicyDetail;

class BonusPolicyDetailRepository extends EloquentRepository implements BonusPolicyDetailRepositoryInterface
{
    public function getModel(){
        return BonusPolicyDetail::class;
    }

    public function latest($condition){
        return $this->model->where('bonus_policy_id', $condition)->orderBy('point', 'desc')->get();
    }
    
}