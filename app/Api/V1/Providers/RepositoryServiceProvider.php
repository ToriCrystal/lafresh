<?php

namespace App\Api\V1\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        'App\Api\V1\Repositories\User\UserRepositoryInterface' => 'App\Api\V1\Repositories\User\UserRepository',
        'App\Api\V1\Repositories\Slider\SliderRepositoryInterface' => 'App\Api\V1\Repositories\Slider\SliderRepository',
        'App\Api\V1\Repositories\Slider\SliderItemRepositoryInterface' => 'App\Api\V1\Repositories\Slider\SliderItemRepository',
        'App\Api\V1\Repositories\Post\PostRepositoryInterface' => 'App\Api\V1\Repositories\Post\PostRepository',
        'App\Api\V1\Repositories\Category\CategoryRepositoryInterface' => 'App\Api\V1\Repositories\Category\CategoryRepository',
        'App\Api\V1\Repositories\Product\ProductRepositoryInterface' => 'App\Api\V1\Repositories\Product\ProductRepository',
        'App\Api\V1\Repositories\ProductCategory\ProductCategoryRepositoryInterface' => 'App\Api\V1\Repositories\ProductCategory\ProductCategoryRepository',
        'App\Api\V1\Repositories\ShoppingCart\ShoppingCartRepositoryInterface' => 'App\Api\V1\Repositories\ShoppingCart\ShoppingCartRepository',
        'App\Api\V1\Repositories\Order\OrderRepositoryInterface' => 'App\Api\V1\Repositories\Order\OrderRepository',
        'App\Api\V1\Repositories\Order\OrderDetailRepositoryInterface' => 'App\Api\V1\Repositories\Order\OrderDetailRepository',
        'App\Api\V1\Repositories\Setting\SettingRepositoryInterface' => 'App\Api\V1\Repositories\Setting\SettingRepository',
        'App\Api\V1\Repositories\Page\PageRepositoryInterface' => 'App\Api\V1\Repositories\Page\PageRepository',
        'App\Api\V1\Repositories\Review\ReviewRepositoryInterface' => 'App\Api\V1\Repositories\Review\ReviewRepository',
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
