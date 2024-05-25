<?php

namespace App\Repositories\Category;
use App\Admin\Repositories\EloquentStandardRepositoryInterface;

interface CategoryRepositoryInterface extends EloquentStandardRepositoryInterface
{
    public function getFlatTreeNotInNode(array $nodeId);
    
    public function getFlatTree();
	
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');

}