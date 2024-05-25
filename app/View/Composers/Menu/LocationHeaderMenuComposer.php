<?php

namespace App\View\Composers\Menu;

use Illuminate\View\View;

class LocationHeaderMenuComposer
{
    protected $repoMenu;

    public function __construct()
    {
        $this->repoMenu = app()->make('App\Repositories\Menu\MenuRepositoryInterface');
    }

    public function compose(View $view)
    {
        $menu = $this->repoMenu->findByLocation('header-menu', ['items.reference']);
        // dd($menu->items->toTree());
        $view->with('menu', $menu);
    }

}