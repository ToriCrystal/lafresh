<?php

namespace App\Admin\Repositories\BonusPolicy;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\BonusPolicy\BonusPolicyRepositoryInterface;
use App\Models\BonusPolicy;

class BonusPolicyRepository extends EloquentRepository implements BonusPolicyRepositoryInterface
{
    public function getModel(){
        return BonusPolicy::class;
    }

    
}