<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Admin\Http\Controllers\BaseSearchSelectController;
use App\Admin\Repositories\Admin\AdminRepositoryInterface;
use App\Admin\Http\Resources\Admin\AdminSearchSelectResource;

class AdminSearchSelectController extends BaseSearchSelectController
{
    public function __construct(
        AdminRepositoryInterface $repository
    ){
        $this->repository = $repository;
    }

    protected function selectResponse(){
        $this->instance = [
            'results' => AdminSearchSelectResource::collection($this->instance)
        ];
    }
}