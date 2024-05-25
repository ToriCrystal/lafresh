<?php

namespace App\Api\V1\Repositories\User;

use App\Admin\Repositories\User\UserRepositoryInterface as AdminUserRepositoryInterface;

interface UserRepositoryInterface extends AdminUserRepositoryInterface
{
    public function findByKey($key, $value);

    public function update($id, array $data);

    public function updateObject($user, $data);

}