<?php

namespace App\Admin\Http\Controllers\User;

use App\Admin\DataTables\User\UserLevelDataTable;
use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\User\UserLevelRequest;
use App\Enums\User\UserLevelTypeDiscount;
use App\Admin\Repositories\User\UserLevelRepositoryInterface;
use App\Admin\Services\User\UserLevelServiceInterface;

class UserLevelController extends Controller
{
    public function __construct(
        UserLevelRepositoryInterface $repository,
        UserLevelServiceInterface $service
    )
    {
        parent::__construct();
        $this->repository = $repository;
        $this->service = $service;
    }

    public function getView()
    {
        return [
            'index' => 'admin.users.levels.index',
            'create' => 'admin.users.levels.create',
            'edit' => 'admin.users.levels.edit',
        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'admin.user.level.index',
            'create' => 'admin.user.level.create',
            'edit' => 'admin.user.level.edit',
            'delete' => 'admin.user.level.delete',
        ];
    }

    public function index(UserLevelDataTable $dataTable){
        return $dataTable->render($this->view['index']);
    }

    public function create(){
        return view($this->view['create'], [
            'user_level_type_discount' => UserLevelTypeDiscount::asSelectArray()
        ]);
    }

    public function edit($id){
        $instance = $this->repository->findOrFail($id);
        return view(
            $this->view['edit'], 
            [
                'user_level' => $instance, 
                'user_level_type_discount' => UserLevelTypeDiscount::asSelectArray()
            ], 
        );
    }

    public function store(UserLevelRequest $request){
        $instance = $this->service->store($request);
        return redirect()->route($this->route['edit'], $instance->id);
    }

    public function update(UserLevelRequest $request){
        $this->service->update($request);

        return back()->with('success', __('notifySuccess'));
    }

    public function delete($id){
        $this->service->delete($id);
        
        return redirect()->route($this->route['index'])->with('success', __('notifySuccess'));
    }
}