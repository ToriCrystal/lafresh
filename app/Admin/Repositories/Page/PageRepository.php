<?php

namespace App\Admin\Repositories\Page;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Page\PageRepositoryInterface;
use App\Models\Page;

class PageRepository extends EloquentRepository implements PageRepositoryInterface
{

    protected $select = [];

    public function getModel(){
        return Page::class;
    }
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC'){
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }
}