<?php

namespace App\Admin\Services\BonusPolicy;

use App\Admin\Repositories\BonusPolicyDetail\BonusPolicyDetailRepositoryInterface;
use App\Admin\Services\BonusPolicy\BonusPolicyServiceInterface;
use Illuminate\Http\Request;

class BonusPolicyService implements BonusPolicyServiceInterface
{
    protected $data;

    protected $repository;

    public function __construct(
        BonusPolicyDetailRepositoryInterface $repository,
    ) {
        $this->repository = $repository;
    }
    

    public function update(Request $reqeust){
        
        $this->data = $reqeust->all();
    
        return $this->repository->update($this->data['id'], ['bonus' => $this->data['newValue']]);
    }

}
