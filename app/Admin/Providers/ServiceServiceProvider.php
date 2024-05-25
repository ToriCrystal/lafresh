<?php

namespace App\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    protected $services = [
        'App\Admin\Services\Admin\AdminServiceInterface' => 'App\Admin\Services\Admin\AdminService',
        'App\Admin\Services\User\UserServiceInterface' => 'App\Admin\Services\User\UserService',
        'App\Admin\Services\ProductCategory\ProductCategoryServiceInterface' => 'App\Admin\Services\ProductCategory\ProductCategoryService',
        'App\Admin\Services\Product\ProductServiceInterface' => 'App\Admin\Services\Product\ProductService',
        'App\Admin\Services\Category\CategoryServiceInterface' => 'App\Admin\Services\Category\CategoryService',
        'App\Admin\Services\Post\PostServiceInterface' => 'App\Admin\Services\Post\PostService',
        'App\Admin\Services\User\UserLevelServiceInterface' => 'App\Admin\Services\User\UserLevelService',
        'App\Admin\Services\Order\OrderServiceInterface' => 'App\Admin\Services\Order\OrderService',
        'App\Admin\Services\Slider\SliderServiceInterface' => 'App\Admin\Services\Slider\SliderService',
        'App\Admin\Services\Slider\SliderItemServiceInterface' => 'App\Admin\Services\Slider\SliderItemService',
        'App\Admin\Services\Page\PageServiceInterface' => 'App\Admin\Services\Page\PageService',
        'App\Admin\Services\Notification\NotificationServiceInterface'=> 'App\Admin\Services\Notification\NotificationService',
        'App\Admin\Services\Discount\DiscountServiceInterface' => 'App\Admin\Services\Discount\DiscountService',
        'App\Admin\Services\BonusPolicy\BonusPolicyServiceInterface' => 'App\Admin\Services\BonusPolicy\BonusPolicyService',
        'App\Admin\Services\BonusSale\BonusSaleServiceInterface' => 'App\Admin\Services\BonusSale\BonusSaleService',
        'App\Admin\Services\Menu\MenuServiceInterface' => 'App\Admin\Services\Menu\MenuService',
        'App\Admin\Services\Notification\NotificationServiceInterface'=> 'App\Admin\Services\Notification\NotificationService'
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        foreach ($this->services as $interface => $implement) {
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
