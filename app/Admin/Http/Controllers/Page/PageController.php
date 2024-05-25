<?php

namespace App\Admin\Http\Controllers\Page;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Page\PageRequest;
use App\Admin\Repositories\Page\PageRepositoryInterface;
use App\Admin\Services\Page\PageServiceInterface;
use App\Admin\DataTables\Page\PageDataTable;

class PageController extends Controller
{
    protected $repositoryCategory;
    public function __construct(
        PageRepositoryInterface $repository, 
        PageServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;
        
        $this->service = $service;
        
    }

    public function getView(){
        return [
            'index' => 'admin.pages.index',
            'create' => 'admin.pages.create',
            'edit' => 'admin.pages.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.page.index',
            'create' => 'admin.page.create',
            'edit' => 'admin.page.edit',
            'delete' => 'admin.page.delete'
        ];
    }
    public function index(PageDataTable $dataTable){
        return $dataTable->render($this->view['index']);
    }

    public function create(){
        return view($this->view['create']);
    }

    public function store(PageRequest $request){

        $instance = $this->service->store($request);
        if($instance){
            return to_route($this->route['edit'], $instance->id);
        }
        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function edit($id){
        
        $page = $this->repository->findOrFail($id);
        return view(
            $this->view['edit'], 
            [
                'page' => $page, 
            ], 
        );

    }

    public function update(PageRequest $request){

        $respone = $this->service->update($request);
        if($respone){
            return back()->with('success', __('notifySuccess'));
        }
        return back()->with('error', __('notifyFail'));
    }

    public function delete($id){

        $this->service->delete($id);
        
        return to_route($this->route['index'])->with('success', __('notifySuccess'));
        
    }
}