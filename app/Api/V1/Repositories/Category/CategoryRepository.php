<?php

namespace App\Api\V1\Repositories\Category;
use App\Admin\Repositories\Category\CategoryRepository as AdminCategoryRepository;
use App\Api\V1\Repositories\Category\CategoryRepositoryInterface;

class CategoryRepository extends AdminCategoryRepository implements CategoryRepositoryInterface
{
    public function getTree(){
        $this->instance = $this->model->published()
        ->orderBy('position', 'ASC')
        ->get()
        ->toTree();
        
        return $this->instance;
    }

    public function findByIdWithAncestorsAndDescendants($id){
        $this->findOrFail($id);

        $this->instance = $this->instance->load([
            'ancestors' => function($query) {
                $query->defaultOrder();
            },
            'descendants'
        ]);
        return $this->instance;

    }
}