<?php

namespace App\Admin\Repositories\Menu;
use App\Admin\Repositories\EloquentStandardRepositoryInterface;

interface MenuItemRepositoryInterface extends EloquentStandardRepositoryInterface
{
    public function deleteBy(array $filter);
}