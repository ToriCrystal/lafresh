<?php

namespace App\Api\V1\Repositories\Page;
use App\Admin\Repositories\Page\PageRepository as AdminPageRepository;
use App\Api\V1\Repositories\Page\PageRepositoryInterface;

class PageRepository extends AdminPageRepository implements PageRepositoryInterface
{
    public function findByIdOrSlug($idOrSlug){
        $this->instance = $this->model->WhereIdOrSlug($idOrSlug)->firstOrFail();
        return $this->instance;
    }
}