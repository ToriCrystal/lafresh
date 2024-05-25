<?php

namespace App\Repositories\User;

use App\Admin\Repositories\EloquentStandardRepositoryInterface;

interface UserRepositoryInterface extends EloquentStandardRepositoryInterface
{
    public function updateObject($user, $data);
    public function findOrFailEmployeeBy(array $filter, array $relations = []);

    public function update($id, array $data);

    public function delete($id);

}