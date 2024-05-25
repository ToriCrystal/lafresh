<?php

namespace App\Repositories\Blog;
use App\Admin\Repositories\EloquentStandardRepositoryInterface;

interface CategoryRepositoryInterface extends EloquentStandardRepositoryInterface
{
    public function findBy(array $filter, array $relations = []);
    public function getBySlug($slug);
}
