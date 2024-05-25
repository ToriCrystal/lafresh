<?php

use App\Enums\Admin\AdminRoles;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Admin\Http\Controllers\Home\HomeController::class, 'index']);

// login
Route::controller(App\Admin\Http\Controllers\Auth\LoginController::class)
->middleware('guest:admin')
->prefix('/login')
->as('login.')
->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/', 'login')->name('post');
});

Route::group(['middleware' => 'admin.auth.admin:admin'], function(){
    
     //menu
     Route::prefix('/menus')->as('menu.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\Menu\MenuController::class)->group(function () {
            Route::get('/them', 'create')->name('create');
            Route::get('/', 'index')->name('index');
            Route::get('/sua/{id}', 'edit')->name('edit');
            Route::put('/sua', 'update')->name('update');
            Route::post('/them', 'store')->name('store');
            Route::delete('/xoa/{id}', 'delete')->name('delete');
        });
    });

    
    Route::controller(App\Admin\Http\Controllers\Statistic\StatisticController::class)
    ->prefix('/thong-ke')
    ->as('statistic.')
    ->group(function(){
        Route::get('/doanh-thu', 'revenue')->name('revenue');
        Route::get('/don-hang', 'order')->name('order');
        Route::get('/san-pham-da-ban', 'productSold')->name('product_sold');
    });



    //sliders
    Route::prefix('/sliders')->as('slider.')->group(function(){
        Route::controller(App\Admin\Http\Controllers\Slider\SliderItemController::class)
        ->as('item.')
        ->group(function(){
            Route::get('/{slider_id}/item/them', 'create')->name('create');
            Route::get('/{slider_id}/item', 'index')->name('index');
            Route::get('/item/sua/{id}', 'edit')->name('edit');
            Route::put('/item/sua', 'update')->name('update');
            Route::post('/item/them', 'store')->name('store');
            Route::delete('/{slider_id}/item/xoa/{id}', 'delete')->name('delete');
        });
        Route::controller(App\Admin\Http\Controllers\Slider\SliderController::class)->group(function(){
            Route::get('/them', 'create')->name('create');
            Route::get('/', 'index')->name('index');
            Route::get('/sua/{id}', 'edit')->name('edit');
            Route::put('/sua', 'update')->name('update');
            Route::post('/them', 'store')->name('store');
            Route::delete('/xoa/{id}', 'delete')->name('delete');
        });
    });

    Route::prefix('/notifications')->as('notify.')->group(function(){
        Route::controller(App\Admin\Http\Controllers\Notification\NotificationController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/them', 'create')->name('create');
            Route::post('/them', 'store')->name('store');
            Route::delete('/xoa/{id}', 'delete')->name('delete');
            Route::get('/sua/{id}', 'edit')->name('edit');
            Route::put('/sua', 'update')->name('update');
        });
    });


    //Order detail
    Route::controller(App\Admin\Http\Controllers\Order\OrderDetailController::class)
    ->prefix('order-detail')
    ->as('order_detail.')
    ->group(function(){
        Route::delete('/delete/{id?}', 'delete')->name('delete');
    });

    //Order
    Route::prefix('/orders')->as('order.')->group(function(){
        Route::controller(App\Admin\Http\Controllers\Order\OrderController::class)->group(function(){
            Route::get('/them', 'create')->name('create');
            Route::get('/', 'index')->name('index');
            Route::get('/sua/{id}', 'edit')->name('edit');
            Route::put('/sua', 'update')->name('update');
            Route::post('/them', 'store')->name('store');
            Route::delete('/xoa/{id}', 'delete')->name('delete');
            Route::get('/render-info-shipping', 'renderInfoShipping')->name('render_info_shipping');
            Route::get('/check-user-role', 'checkUserRole')->name('check_user_role');
            Route::get('/check-user-role', 'checkUserRole')->name('check_user_role');
            Route::get('/add-product', 'addProduct')->name('add_product');
            Route::get('/calculate-total-before-save-order', 'calculateTotalBeforeSaveOrder')->name('calculate_total_before_save_order');
            Route::get('/update-price-product', 'updatePriceProduct')->name('route_update_price_product');

        });
    });
    //page
    Route::prefix('/pages')->as('page.')->group(function(){
        Route::controller(App\Admin\Http\Controllers\Page\PageController::class)->group(function(){
            Route::group(['middleware' => 'admin.auth.roles:'.AdminRoles::SuperAdmin->value], function(){
                Route::get('/them', 'create')->name('create');
                Route::post('/them', 'store')->name('store');
                Route::delete('/xoa/{id}', 'delete')->name('delete');
            });

            Route::get('/', 'index')->name('index');
            Route::get('/sua/{id}', 'edit')->name('edit');
            Route::put('/sua', 'update')->name('update');
        });
    });

    //Post
    Route::prefix('/posts')->as('post.')->group(function(){
        Route::controller(App\Admin\Http\Controllers\Post\PostController::class)->group(function(){
            Route::get('/them', 'create')->name('create');
            Route::get('/', 'index')->name('index');
            Route::get('/sua/{id}', 'edit')->name('edit');
            Route::put('/sua', 'update')->name('update');
            Route::post('/them', 'store')->name('store');
            Route::delete('/xoa/{id}', 'delete')->name('delete');
        });
    });

    //Post category
    Route::prefix('/categories')->as('category.')->group(function(){
        Route::controller(App\Admin\Http\Controllers\Category\CategoryController::class)->group(function(){
            Route::get('/them', 'create')->name('create');
            Route::get('/', 'index')->name('index');
            Route::get('/sua/{id}', 'edit')->name('edit');
            Route::put('/sua', 'update')->name('update');
            Route::post('/them', 'store')->name('store');
            Route::delete('/xoa/{id}', 'delete')->name('delete');
        });
    });

    //Product purchase qty
    Route::controller(App\Admin\Http\Controllers\Product\ProductPurchaseQtyController::class)
    ->prefix('/product-purchase-qty')
    ->as('product_purchase_qty.')
    ->group(function(){
        Route::get('/them', 'create')->name('create');
        Route::delete('/xoa/{id}', 'delete')->name('delete');
    });

    //Product
    Route::controller(App\Admin\Http\Controllers\Product\ProductController::class)
    ->prefix('/products')
    ->as('product.')
    ->group(function(){
        Route::get('/them', 'create')->name('create');
        Route::get('/', 'index')->name('index');
        Route::get('/sua/{id}', 'edit')->name('edit');
        Route::put('/sua', 'update')->name('update');
        Route::post('/them', 'store')->name('store');
        Route::delete('/xoa/{id}', 'delete')->name('delete');
        Route::post('/xu-ly-nhieu-ban-ghi', 'actionMultipleRecode')->name('multiple');
    });

    //discount
    Route::controller(App\Admin\Http\Controllers\Discount\DiscountController::class)
    ->prefix('/discount')
    ->as('discount.')
    ->group(function(){
        Route::get('/agent', 'indexAgent')->name('agent');
        Route::post('/sua/dai-ly', 'editAgent')->name('edit.agent');
        
        Route::get('/seller', 'indexSeller')->name('seller');
        Route::get('/them/seller', 'create')->name('create');
        Route::post('/them/seller', 'store')->name('seller.store');
        Route::get('/sua/seller/{id}', 'editSeller')->name('edit.seller');
        Route::put('/sua/seller', 'updateSeller')->name('update.seller');
        Route::delete('/xoa/{id}', 'deleteSeller')->name('delete.seller');

    });

    //bonus policy
    Route::controller(App\Admin\Http\Controllers\BonusPolicy\BonusPoliCyController::class)
    ->prefix('/bonus-policy')
    ->as('bonus.policy.')
    ->group(function (){
        Route::get('/', 'info')->name('info');
        Route::post('/sua', 'update')->name('update');
        Route::get('/point', 'point')->name('point');
    });

    //Bonus sale 
    Route::controller(App\Admin\Http\Controllers\BonusSale\BonusSaleController::class)
    ->prefix('/bonus-sales')
    ->as('bonus.sales.')
    ->group(function (){
        Route::get('/', 'index')->name('index');
        Route::delete('xoa/{id}', 'delete')->name('delete');
    });

    //Product Category
    Route::prefix('/product-categories')->as('product_category.')->group(function(){
        Route::controller(App\Admin\Http\Controllers\ProductCategory\ProductCategoryController::class)->group(function(){
            Route::get('/them', 'create')->name('create');
            Route::get('/', 'index')->name('index');
            Route::get('/sua/{id}', 'edit')->name('edit');
            Route::put('/sua', 'update')->name('update');
            Route::post('/them', 'store')->name('store');
            Route::delete('/xoa/{id}', 'delete')->name('delete');
        });
    });

    //user level


    //user
    Route::prefix('/manager-user')->as('user.')->group(function(){
        Route::controller(App\Admin\Http\Controllers\User\UserController::class)->group(function(){
            Route::get('/them', 'create')->name('create');
            Route::get('/', 'index')->name('index');
            Route::get('/sua/{id}', 'edit')->name('edit');
            Route::put('/sua', 'update')->name('update');
            Route::post('/them', 'store')->name('store');
            Route::delete('/xoa/{id}', 'delete')->name('delete');
        });
        Route::controller(App\Admin\Http\Controllers\User\UserLevelController::class)
        ->prefix('/levels')
        ->as('level.')
        ->group(function(){
            Route::get('/them', 'create')->name('create');
            Route::get('/', 'index')->name('index');
            Route::get('/sua/{id}', 'edit')->name('edit');
            Route::put('/sua', 'update')->name('update');
            Route::post('/them', 'store')->name('store');
            Route::delete('/xoa/{id}', 'delete')->name('delete');
        });
        // Route::get('/select-search', [AdminSearchController::class, 'selectSearch'])->name('selectsearch');
    });
    //admin
    Route::prefix('/manager-admin')->as('admin.')->group(function(){
        Route::controller(App\Admin\Http\Controllers\Admin\AdminController::class)->group(function(){
            Route::get('/them', 'create')->name('create');
            Route::get('/', 'index')->name('index');
            Route::get('/sua/{id}', 'edit')->name('edit');
            Route::put('/sua', 'update')->name('update');
            Route::post('/them', 'store')->name('store');
            Route::delete('/xoa/{id}', 'delete')->name('delete');
        });
        // Route::get('/select-search', [AdminSearchController::class, 'selectSearch'])->name('selectsearch');
    });

    //Settings
    Route::controller(App\Admin\Http\Controllers\Setting\SettingController::class)
    ->prefix('/settings')
    ->as('setting.')
    ->group(function(){
        Route::get('/general', 'general')->name('general');
        Route::put('/update', 'update')->name('update');
    });

    //ckfinder
    Route::prefix('/quan-ly-file')->as('ckfinder.')->group(function(){
        Route::any('/ket-noi', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
        ->name('connector');
        Route::any('/duyet', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
        ->name('browser');
    });
    Route::get('/dashboard', [App\Admin\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard');

    //auth
    Route::controller(App\Admin\Http\Controllers\Auth\ProfileController::class)
    ->prefix('/profile')
    ->as('profile.')
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::put('/', 'update')->name('update');
    });

    Route::controller(App\Admin\Http\Controllers\Auth\ChangePasswordController::class)
    ->prefix('/password')
    ->as('password.')
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::put('/', 'update')->name('update');
    });

    Route::prefix('/search')->as('search.')->group(function () {
        Route::prefix('/select')->as('select.')->group(function () {
            Route::get('/user', [App\Admin\Http\Controllers\User\UserSearchSelectController::class, 'selectSearch'])->name('user');
            Route::get('/admin', [App\Admin\Http\Controllers\Admin\AdminSearchSelectController::class, 'selectSearch'])->name('admin');
            Route::get('/product', [App\Admin\Http\Controllers\Product\ProductSearchSelectController::class, 'selectSearch'])->name('product');
            Route::get('/product', [App\Admin\Http\Controllers\Product\ProductSearchSelectController::class, 'selectSearch'])->name('product');
        });
        Route::get('/render-product', [App\Admin\Http\Controllers\Product\ProductController::class, 'searchRenderProduct'])->name('render_product');
    });

    Route::post('/logout', [App\Admin\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');
});
