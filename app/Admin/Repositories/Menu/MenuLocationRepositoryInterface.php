<?php

namespace App\Admin\Repositories\Menu;
use App\Admin\Repositories\EloquentStandardRepositoryInterface;

interface MenuLocationRepositoryInterface extends EloquentStandardRepositoryInterface
{
    public function updateOrCreate(array $compare, array $data);
}