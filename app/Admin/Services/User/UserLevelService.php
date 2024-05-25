<?php

namespace App\Admin\Services\User;

use App\Admin\Services\User\UserLevelServiceInterface;
use  App\Admin\Repositories\User\UserLevelRepositoryInterface;
use Illuminate\Http\Request;

class UserLevelService implements UserLevelServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;
    
    protected $repository;

    public function __construct(UserLevelRepositoryInterface $repository){
        $this->repository = $repository;
    }
    
    public function store(Request $request){

        $this->data = $request->validated();

        return $this->repository->create($this->data);
    }

    public function update(Request $request){
        
        $this->data = $request->validated();

        return $this->repository->update($this->data['id'], $this->data);

    }

    public function delete($id){
        return $this->repository->delete($id);
    }

}