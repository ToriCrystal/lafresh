<?php

namespace App\Repositories\User;

use App\Admin\Repositories\User\UserRepository as AdminUserRepository;
use App\Repositories\User\UserRepositoryInterface;

class UserRepository extends AdminUserRepository implements UserRepositoryInterface
{

    public function updateObject($user, $data)
    {
        $user->update($data);
        return $user;
    }

    public function findOrFailEmployeeBy(array $filter, array $relations = [])
    {
        $this->getQueryBuilder();

        $this->applyFilters($filter);

        $this->instance = $this->instance->employee()->with($relations);

        $this->instance = $this->instance->firstOrFail();

        $this->authorize('view');

        return $this->instance;
    }

    public function update($id, array $data)
    {
        $this->find($id);

        if ($this->instance) {
            $this->instance->update($data);

            $this->authorize('update');

            return $this->instance;
        }

        return false;
    }

    public function delete($id)
    {
        $this->find($id);
        if ($this->instance) {
            $this->instance->delete();

            $this->authorize('delete');

            return true;
        }

        return false;
    }
}