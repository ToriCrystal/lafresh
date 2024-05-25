<?php

namespace App\View\Composers\Menu;

use Illuminate\View\View;

class LocationFooterMenuComposer
{
    protected $repoMenu;

    public function __construct()
    {
        $this->repoMenu = app()->make('App\Repositories\Menu\MenuRepositoryInterface');
    }

    public function compose(View $view)
    {
        $menu = $this->repoMenu->findByLocation('footer-menu', ['items.reference']);
        $view->with('menu', $menu);
    }

}