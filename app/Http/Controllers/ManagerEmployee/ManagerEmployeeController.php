<?php

namespace App\Http\Controllers\ManagerEmployee;

use App\Admin\Http\Controllers\Controller;
use App\Enums\User\UserGender;
use App\Http\Requests\ManagerEmployee\ManagerEmployeeRequest;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\ManagerEmployee\ManagerEmployeeServiceInterface;

class ManagerEmployeeController extends Controller
{
    public function __construct(
        UserRepositoryInterface $repository,
        ManagerEmployeeServiceInterface $service,
    ) {
        parent::__construct();
        $this->repository = $repository;
        $this->service = $service;
    }

    public function getView()
    {
        return [
            'index' => 'public.auth.manager_employees.index',
            'create' => 'public.auth.manager_employees.create',
            'edit' => 'public.auth.manager_employees.edit',
        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'manager_employee.index',
            'create' => 'manager_employee.create',
            'edit' => 'manager_employee.edit',
        ];
    }

    public function index()
    {
        $users = $this->repository->getBy(['parent_id' => auth()->user()->id]);
        $breadcrums = [['label' => trans('Quản lý nhân viên')]];

        return view($this->view['index'], compact('breadcrums', 'users'));
    }

    public function create()
    {
        $breadcrums = [
            ['label' => trans('Quản lý nhân viên'), 'url' => route('manager_employee.index')],
            ['label' => trans('Thêm')]
        ];
        $gender = UserGender::asSelectArray();

        return view($this->view['create'], compact('breadcrums', 'gender'));
    }

    public function store(ManagerEmployeeRequest $request)
    {
        $employee = $this->service->storeEmployee($request);

        if ($employee) {
            return to_route($this->route['index'])->with('success', __('notifySuccess'));
        }
        return back()->with('error', trans('notifyFail'));
    }

    public function edit($id)
    {
        $employee = $this->repository->findOrFailEmployeeBy(['id' => $id], ['parent']);

        $breadcrums = [
            ['label' => trans('Quản lý nhân viên'), 'url' => route('manager_employee.index')],
            ['label' => trans('Sửa')]
        ];
        $gender = UserGender::asSelectArray();

        return view($this->view['edit'], compact('breadcrums', 'gender', 'employee'));
    }

    public function update(ManagerEmployeeRequest $request)
    {
        $this->service->updateEmployee($request);

        return back()->with('success', __('notifySuccess'));
    }

    public function delete($id)
    {
        $this->service->delete($id);

        return to_route($this->route['index'])->with('success', __('notifySuccess'));
    }

}