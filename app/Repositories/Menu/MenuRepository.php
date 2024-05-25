<?php

namespace App\Repositories\Menu;

use App\Admin\Repositories\Menu\MenuRepository as AdminMenuRepository;
use App\Repositories\Menu\MenuRepositoryInterface;

class MenuRepository extends AdminMenuRepository implements MenuRepositoryInterface
{
    public function findByLocation($location = '', array $relations = []){
        
        $this->instance = $this->model->whereRelation('locations', 'location', $location)
        ->with($relations)
        ->published()
        ->first();

        return $this->instance;
    }
}