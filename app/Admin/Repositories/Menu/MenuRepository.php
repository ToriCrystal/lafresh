<?php

namespace App\Admin\Repositories\Menu;

use App\Admin\Repositories\EloquentStandardRepository;
use App\Admin\Repositories\Menu\MenuRepositoryInterface;
use App\Models\Menu;

class MenuRepository extends EloquentStandardRepository implements MenuRepositoryInterface
{
    public function getModel(){
        return Menu::class;
    }
}