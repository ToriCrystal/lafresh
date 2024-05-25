<?php

namespace App\Repositories\Blog;

use App\Admin\Repositories\EloquentStandardRepository;
use App\Repositories\Blog\CategoryRepositoryInterface;
use App\Models\PostCategory;

class CategoryRepository extends EloquentStandardRepository implements CategoryRepositoryInterface
{

    public function getModel(){
        return PostCategory::class;
    }

    public function findBy(array $filter, array $relations = []){

        $this->instance = $this->model;

        $this->applyFilters($filter);

        $this->instance = $this->instance->with($relations)->first();

        return $this->instance;
    }

    public function getBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}
