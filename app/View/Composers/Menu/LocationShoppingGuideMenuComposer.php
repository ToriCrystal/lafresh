<?php

namespace App\View\Composers\Menu;

use Illuminate\View\View;

class LocationShoppingGuideMenuComposer
{
    protected $repoMenu;

    public function __construct()
    {
        $this->repoMenu = app()->make('App\Repositories\Menu\MenuRepositoryInterface');
    }

    public function compose(View $view)
    {
        $menuShopping = $this->repoMenu->findByLocation('shopping-guide-menu', ['items.reference']);
        // dd($menu->items->toTree());
        $view->with('menuShopping', $menuShopping);
    }

}