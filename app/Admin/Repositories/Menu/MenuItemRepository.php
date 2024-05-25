<?php

namespace App\Admin\Repositories\Menu;

use App\Admin\Repositories\EloquentStandardRepository;
use App\Admin\Repositories\Menu\MenuItemRepositoryInterface;
use App\Models\MenuItem;

class MenuItemRepository extends EloquentStandardRepository implements MenuItemRepositoryInterface
{
    public function getModel(){
        return MenuItem::class;
    }

    public function deleteBy(array $filter){
        $this->getQueryBuilder();
        $this->applyFilters($filter);
        return $this->instance->delete();
    }
}