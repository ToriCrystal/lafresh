<?php

namespace App\Api\V1\Repositories\Page;
use App\Admin\Repositories\EloquentRepositoryInterface;

interface PageRepositoryInterface extends EloquentRepositoryInterface
{
    public function findByIdOrSlug($idOrSlug);
}