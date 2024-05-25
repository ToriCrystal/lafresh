<?php

namespace App\Repositories\Menu;
use App\Admin\Repositories\EloquentStandardRepositoryInterface;

interface MenuRepositoryInterface extends EloquentStandardRepositoryInterface
{
    public function findByLocation($location = '', array $relations = []);
}