<?php

namespace App\Admin\Repositories\DiscountAgent;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\DiscountAgent\DiscountAgentRepositoryInterface;
use App\Models\DiscountAgent;

class DiscountAgentRepository extends EloquentRepository implements DiscountAgentRepositoryInterface
{
    public function getModel(){
        return DiscountAgent::class;
    }

    public function findLevel($level){
        return $this->model->where('discount_data->level', $level)->first();
    }
    
}