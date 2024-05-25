<?php

namespace App\Api\V1\Repositories\Category;
use App\Admin\Repositories\EloquentRepositoryInterface;

interface CategoryRepositoryInterface extends EloquentRepositoryInterface
{
    public function findByIdWithAncestorsAndDescendants($id);
    public function getTree();
}