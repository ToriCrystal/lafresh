<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Admin\AdminRequest;
use App\Admin\Repositories\Admin\AdminRepositoryInterface;
use App\Admin\Services\Admin\AdminServiceInterface;
use App\Admin\DataTables\Admin\AdminDataTable;
use App\Enums\Admin\AdminRoles;

class AdminController extends Controller
{
    public function __construct(
        AdminRepositoryInterface $repository, 
        AdminServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;
        
        $this->service = $service;
        
    }

    public function getView(){
        return [
            'index' => 'admin.admins.index',
            'create' => 'admin.admins.create',
            'edit' => 'admin.admins.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.admin.index',
            'create' => 'admin.admin.create',
            'edit' => 'admin.admin.edit',
            'delete' => 'admin.admin.delete'
        ];
    }
    public function index(AdminDataTable $dataTable){
        return $dataTable->render($this->view['index'], ['roles' => auth('admin')->user()->roles->asArraySelectListRolesAdminAfterCase()]);
    }

    public function create(){
        return view($this->view['create'], ['roles' => auth('admin')->user()->roles->asArraySelectListRolesAdminAfterCase()]);
    }

    public function store(AdminRequest $request){

        $instance = $this->service->store($request);

        return redirect()->route($this->route['edit'], $instance->id);

    }

    public function edit($id){
        
        $instance = $this->repository->findOrFail($id);
        return view(
            $this->view['edit'], 
            [
                'admin' => $instance, 
                'roles' => auth('admin')->user()->roles->asArraySelectListRolesAdminAfterCase() 
            ], 
        );

    }

    public function update(AdminRequest $request){

        $this->service->update($request);

        return back()->with('success', __('notifySuccess'));

    }

    public function delete($id){

        $this->service->delete($id);
        
        return redirect()->route($this->route['index'])->with('success', __('notifySuccess'));
        
    }
}