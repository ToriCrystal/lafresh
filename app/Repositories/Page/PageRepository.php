<?php

namespace App\Repositories\Page;

use App\Admin\Repositories\Page\PageRepository as AdminPageRepository;
use App\Models\Page;
use App\Repositories\Page\PageRepositoryInterface;

class PageRepository extends AdminPageRepository implements PageRepositoryInterface
{
    protected $select = [];

    public function getModel()
    {
        return Page::class;
    }

    public function findByOrFail($slug)
    {
        return $this->model->where('slug', $slug)->get();
    }
}
