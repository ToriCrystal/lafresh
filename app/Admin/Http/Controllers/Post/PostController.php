<?php

namespace App\Admin\Http\Controllers\Post;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Post\PostRequest;
use App\Admin\Repositories\Post\PostRepositoryInterface;
use App\Admin\Repositories\Category\CategoryRepositoryInterface;
use App\Admin\Services\Post\PostServiceInterface;
use App\Admin\DataTables\Post\PostDataTable;
use App\Enums\Post\PostStatus;

class PostController extends Controller
{
    protected $repositoryCategory;
    public function __construct(
        PostRepositoryInterface $repository, 
        CategoryRepositoryInterface $repositoryCategory,
        PostServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;
        $this->repositoryCategory = $repositoryCategory;
        
        $this->service = $service;
        
    }

    public function getView(){
        return [
            'index' => 'admin.posts.index',
            'create' => 'admin.posts.create',
            'edit' => 'admin.posts.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.post.index',
            'create' => 'admin.post.create',
            'edit' => 'admin.post.edit',
            'delete' => 'admin.post.delete'
        ];
    }
    public function index(PostDataTable $dataTable){
        return $dataTable->render($this->view['index'], [
            'status' => PostStatus::asSelectArray()
        ]);
    }

    public function create(){
        $categories = $this->repositoryCategory->getFlatTree();
        return view($this->view['create'], [
            'categories' => $categories,
            'status' => PostStatus::asSelectArray()
        ]);
    }

    public function store(PostRequest $request){

        $instance = $this->service->store($request);
        if($instance){
            return to_route($this->route['edit'], $instance->id);
        }
        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function edit($id){
        $categories = $this->repositoryCategory->getFlatTree();
        
        $post = $this->repository->findOrFailWithRelations($id);
        return view(
            $this->view['edit'], 
            [
                'categories' => $categories,
                'post' => $post, 
                'status' => PostStatus::asSelectArray()
            ], 
        );

    }

    public function update(PostRequest $request){

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