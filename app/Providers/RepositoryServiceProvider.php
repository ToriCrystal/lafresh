<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        'App\Repositories\User\UserRepositoryInterface' => 'App\Repositories\User\UserRepository',
        'App\Repositories\Setting\SettingRepositoryInterface' => 'App\Repositories\Setting\SettingRepository',
        'App\Repositories\Menu\MenuRepositoryInterface' => 'App\Repositories\Menu\MenuRepository',
        'App\Repositories\Menu\MenuItemRepositoryInterface' => 'App\Repositories\Menu\MenuItemRepository',
        'App\Repositories\Blog\PostRepositoryInterface' => 'App\Repositories\Blog\PostRepository',
        'App\Repositories\Blog\CategoryRepositoryInterface' => 'App\Repositories\Blog\CategoryRepository',
        'App\Repositories\Product\ProductRepositoryInterface' => 'App\Repositories\Product\ProductRepository',
        'App\Repositories\Category\CategoryRepositoryInterface' => 'App\Repositories\Category\CategoryRepository',
        'App\Repositories\Order\OrderRepositoryInterface' => 'App\Repositories\Order\OrderRepository',
        'App\Repositories\Slider\SliderRepositoryInterface' => 'App\Repositories\Slider\SliderRepository',
        'App\Repositories\Slider\SliderItemRepositoryInterface' => 'App\Repositories\Slider\SliderItemRepository',
        'App\Repositories\Page\PageRepositoryInterface' => 'App\Repositories\Page\PageRepository',
        'App\Repositories\AttributeVariation\AttributeVariationRepositoryInterface' => 'App\Repositories\AttributeVariation\AttributeVariationRepository',
        'App\Repositories\Blog\PostRepositoryInterface' => 'App\Repositories\Blog\PostRepository',
        'App\Repositories\Notification\NotificationRepositoryInterface' => 'App\Repositories\Notification\NotificationRepository',
        'App\Repositories\ShoppingCart\ShoppingCartRepositoryInterface' => 'App\Repositories\ShoppingCart\ShoppingCartRepository',
        'App\Repositories\Order\OrderDetailRepositoryInterface' => 'App\Repositories\Order\OrderDetailRepository',
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        foreach ($this->repositories as $interface => $implement) {
            $this->app->singleton($interface, $implement);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
