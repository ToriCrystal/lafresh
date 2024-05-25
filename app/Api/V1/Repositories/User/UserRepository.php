<?php

namespace App\Api\V1\Repositories\User;
use App\Admin\Repositories\User\UserRepository as AdminUserRepository;
use App\Api\V1\Repositories\User\UserRepositoryInterface;
use App\Models\User;

class UserRepository extends AdminUserRepository implements UserRepositoryInterface
{
    public function findByKey($key, $value){
        $this->instance = $this->model->where($key, $value)->first();
        return $this->instance;
    }

    public function updateObject($user, $data){
        $user->update($data);
        return $user;
    }
}