<?php

namespace App\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        'App\Admin\Repositories\Admin\AdminRepositoryInterface' => 'App\Admin\Repositories\Admin\AdminRepository',
        'App\Admin\Repositories\User\UserRepositoryInterface' => 'App\Admin\Repositories\User\UserRepository',
        'App\Admin\Repositories\Setting\SettingRepositoryInterface' => 'App\Admin\Repositories\Setting\SettingRepository',
        'App\Admin\Repositories\ProductCategory\ProductCategoryRepositoryInterface' => 'App\Admin\Repositories\ProductCategory\ProductCategoryRepository',
        'App\Admin\Repositories\Product\ProductRepositoryInterface' => 'App\Admin\Repositories\Product\ProductRepository',
        'App\Admin\Repositories\Category\CategoryRepositoryInterface' => 'App\Admin\Repositories\Category\CategoryRepository',
        'App\Admin\Repositories\Post\PostRepositoryInterface' => 'App\Admin\Repositories\Post\PostRepository',
        'App\Admin\Repositories\User\UserLevelRepositoryInterface' => 'App\Admin\Repositories\User\UserLevelRepository',
        'App\Admin\Repositories\Order\OrderRepositoryInterface' => 'App\Admin\Repositories\Order\OrderRepository',
        'App\Admin\Repositories\Order\OrderDetailRepositoryInterface' => 'App\Admin\Repositories\Order\OrderDetailRepository',
        'App\Admin\Repositories\Slider\SliderRepositoryInterface' => 'App\Admin\Repositories\Slider\SliderRepository',
        'App\Admin\Repositories\Slider\SliderItemRepositoryInterface' => 'App\Admin\Repositories\Slider\SliderItemRepository',
        'App\Admin\Repositories\Page\PageRepositoryInterface' => 'App\Admin\Repositories\Page\PageRepository',
        'App\Admin\Repositories\DiscountAgent\DiscountAgentRepositoryInterface' => 'App\Admin\Repositories\DiscountAgent\DiscountAgentRepository',
        'App\Admin\Repositories\DiscountSeller\DiscountSellerRepositoryInterface' => 'App\Admin\Repositories\DiscountSeller\DiscountSellerRepository',
        'App\Admin\Repositories\BonusPolicy\BonusPolicyRepositoryInterface' => 'App\Admin\Repositories\BonusPolicy\BonusPolicyRepository',
        'App\Admin\Repositories\Menu\MenuRepositoryInterface' => 'App\Admin\Repositories\Menu\MenuRepository',
        'App\Admin\Repositories\Menu\MenuItemRepositoryInterface' => 'App\Admin\Repositories\Menu\MenuItemRepository',
        'App\Admin\Repositories\Menu\MenuLocationRepositoryInterface' => 'App\Admin\Repositories\Menu\MenuLocationRepository',
        'App\Admin\Repositories\BonusPolicyDetail\BonusPolicyDetailRepositoryInterface' => 'App\Admin\Repositories\BonusPolicyDetail\BonusPolicyDetailRepository',
        'App\Admin\Repositories\BonusSale\BonusSaleRepositoryInterface' => 'App\Admin\Repositories\BonusSale\BonusSaleRepository',
        'App\Admin\Repositories\PostCategory\PostCategoryRepositoryInterface' => 'App\Admin\Repositories\PostCategory\PostCategoryRepository',
        'App\Admin\Repositories\Notification\NotificationRepositoryInterface' => 'App\Admin\Repositories\Notification\NotificationRepository'
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
