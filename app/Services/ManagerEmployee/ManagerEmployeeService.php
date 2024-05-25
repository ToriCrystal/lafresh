<?php

namespace App\Services\ManagerEmployee;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Admin\Traits\Setup;
use Illuminate\Support\Facades\DB;
use App\Enums\User\UserRoles;

class ManagerEmployeeService implements ManagerEmployeeServiceInterface
{
    use Setup;
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;

    protected $repository;
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function store(Request $request)
    {

    }
    public function storeEmployee(Request $request)
    {
        $this->data = $request->validated();

        $this->data['parent_id'] = auth()->user()->id;
        $this->data['username'] = $this->data['phone'];
        $this->data['roles'] = UserRoles::Employee();

        return $this->repository->create($this->data);
    }

    public function updateEmployee(Request $request)
    {
        $this->data = $request->validated();

        $this->baseUpdate();

        $this->repository = $this->repository->update($this->data['id'], $this->data);

        return $this->repository;
    }

    protected function baseUpdate()
    {
        if (isset($this->data['password']) && $this->data['password']) {
            $this->data['password'] = bcrypt($this->data['password']);
        } else {
            unset($this->data['password']);
        }
    }
    public function delete($id)
    {

        $this->repository = $this->repository->delete($id);

        return $this->repository;
    }
}