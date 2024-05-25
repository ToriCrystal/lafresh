<?php

namespace App\Admin\Services\Page;

use App\Admin\Services\Page\PageServiceInterface;
use  App\Admin\Repositories\Page\PageRepositoryInterface;
use Illuminate\Http\Request;

class PageService implements PageServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;
    
    protected $repository;

    public function __construct(PageRepositoryInterface $repository){
        $this->repository = $repository;
    }
    
    public function store(Request $request){

        $this->data = $request->validated();
        
        $post = $this->repository->create($this->data);

        return $post;
    }

    public function update(Request $request){
        
        $this->data = $request->validated();

        $post = $this->repository->update($this->data['id'], $this->data);
        return $post;
    }

    public function delete($id){
        return $this->repository->delete($id);
    }

}