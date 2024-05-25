<?php

namespace App\Providers;

use App\View\Composers\Cart\CartComposer;
use App\View\Composers\Menu\LocationFooterMenuComposer;
use App\View\Composers\Menu\LocationHeaderMenuComposer;
use App\View\Composers\Menu\LocationShoppingGuideMenuComposer;
use App\View\Composers\Notification\NotificationComposer;
use App\View\Composers\Product\FilterProductComposer;
use App\View\Composers\Product\NewProductComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\View\Composers\Setting\SettingComposer;
use App\View\Composers\Post\PostComposer;
use App\View\Composers\Slider\SliderComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer([
            'public.layouts.footer',
            'public.layouts.head',
            'public.layouts.header',
            'public.products.partials.related-products'
        ], SettingComposer::class);

        View::composer(['public.layouts.header'], LocationHeaderMenuComposer::class);
        View::composer(['public.layouts.components.offcanvas_cart'], CartComposer::class);
        View::composer(['public.carts.index','public.checkout.index','public.layouts.modals.modal-success-payment','public.carts.detail-cart', 'public.checkout.fullcart'], CartComposer::class);
        View::composer(['public.home.partials.products','public.carts.index','public.carts.detail-cart'], NewProductComposer::class);
        // View::composer(['public.products.partials.filter'], FilterProductComposer::class);
        View::composer(['public.layouts.footer'], LocationFooterMenuComposer::class);
        View::composer(['public.layouts.footer'], LocationShoppingGuideMenuComposer::class);
        View::composer(['public.home.partials.slider', 'public.home.partials.blog', 'public.home.partials.gallery'], SliderComposer::class);
        View::composer(['public.home.partials.news'], PostComposer::class);
        View::composer(['public.layouts.header'],  NotificationComposer::class);
        View::composer(['public.layouts.header'],  NewProductComposer::class);
        // View::composer(['public.products.searchs.product-result'],  NewProductComposer::class);
    }
}
