<?php

use App\Enums\User\UserRoles;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(App\Http\Controllers\Category\CategoryController::class)
    ->prefix('/product-categories')
    ->as('product_category.')
    ->group(function () {
        Route::get('/{slug}', 'show')->name('show');
    });

Route::controller(App\Http\Controllers\Product\ProductController::class)
    ->prefix('/products')
    ->as('product.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/search', 'search')->name('search');
        Route::get('/{slug}', 'show')->name('show');
    });

// Category
Route::controller(App\Http\Controllers\Blog\PostCategoryController::class)
    ->prefix('/post-categories')
    ->as('post_category.')
    ->group(function () {
        Route::get('/{slug}', 'show')->name('show');
    });

// BLOG
Route::controller(App\Http\Controllers\Blog\BlogController::class)
    ->prefix('/blog')
    ->as('post.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{slug}', 'showPost')->name('show');
    });

Route::controller(App\Http\Controllers\Home\HomeController::class)
    ->prefix('/')
    ->as('home.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });

Route::middleware(['guest'])
    ->group(function () {

        Route::controller(App\Http\Controllers\Auth\RegisterController::class)
            ->prefix('/register')
            ->as('register.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'handle')->name('handle');
            });

        Route::controller(App\Http\Controllers\Auth\LoginController::class)
            ->prefix('/login')
            ->as('login.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'handle')->name('handle');
            });

        Route::controller(App\Http\Controllers\Auth\ResetPasswordController::class)
            ->prefix('/reset-password')
            ->as('reset_password.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'handle')->name('handle');
                Route::get('/reset', 'reset')->name('reset')->middleware('signed');
                Route::put('/update', 'update')->name('update');
            });
    });

Route::middleware(['auth'])->group(function () {

    Route::controller(App\Http\Controllers\Auth\ProfileController::class)
        ->prefix('/profile')
        ->as('profile.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::put('/', 'update')->name('update');
        });

    Route::controller(App\Http\Controllers\Auth\SecurityController::class)
        ->prefix('/security')
        ->as('security.')
        ->group(function () {
            Route::get('/change-password', 'changePassword')->name('change_password');
            Route::put('/change-password', 'handleChangePassword')->name('handle_change_password');
        });

    // Route::controller(App\Http\Controllers\ShoppingCart\ShoppingCartController::class)
    //     ->prefix('/shopping-cart')
    //     ->as('shopping_cart.')
    //     ->group(function () {
    //         Route::get('/', 'index')->name('index');
    //         Route::post('/store', 'store')->name('store');
    //         Route::put('/update', 'update')->name('update');
    //         Route::delete('/delete/{id}', 'delete')->name('delete');
    //     });


    Route::controller(App\Http\Controllers\Order\OrderController::class)
        ->prefix('/orders')
        ->as('order.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}', 'show')->name('show');
            Route::delete('/cancel/{id}', 'cancel')->name('cancel');
        });

    // Route::middleware(['auth.roles:' . UserRoles::Agent])
    //     ->controller(App\Http\Controllers\ManagerEmployee\ManagerEmployeeController::class)
    //     ->prefix('/manager-employees')
    //     ->as('manager_employee.')
    //     ->group(function () {
    //         Route::get('/', 'index')->name('index');
    //         Route::get('/create', 'create')->name('create');
    //         Route::post('/store', 'store')->name('store');
    //         Route::get('/edit/{id}', 'edit')->name('edit');
    //         Route::put('/update', 'update')->name('update');
    //         Route::delete('/delete/{id}', 'delete')->name('delete');
    //     });

    Route::post('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');
});

Route::controller(App\Http\Controllers\Home\HomeController::class)
    ->prefix('/')
    ->as('home.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });

Route::controller(App\Http\Controllers\Page\PageController::class)
    ->prefix('/pages')
    ->as('page.')
    ->group(function () {
        Route::get('/{slug}', 'pages')->name('show');
    });


Route::prefix('/collaboration')->as('collaboration.')->group(function () {
    Route::get('/', function () {
        return view('public.collaboration.index');
    })->name('index');
});

Route::prefix('/policy')->as('policy.')->group(function () {
    Route::get('/', function () {
        return view('public.policy.index');
    })->name('index');
});

Route::prefix('/contact')->as('contact.')->group(function () {
    Route::get('/', function () {
        return view('public.contact.index');
    })->name('index');
});

Route::prefix('/notification')->as('notification.')->group(function () {
    Route::get('/', function () {
        return view('public.notification.index');
    })->name('index');
});


Route::controller(App\Http\Controllers\Notification\NotificationController::class)
    ->prefix('/notification')
    ->as('notification.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });




Route::prefix('/company')->as('company.')->group(function () {
    Route::get('/{id}', function () {
        return view('public.company.index');
    })->name('index');
    Route::get('/activism', function () {
        return view('public.company.activism');
    })->name('activism');
});


Route::prefix('/cart')->as('cart.')->group(function () {
    Route::controller(App\Http\Controllers\Cart\CartController::class)->group(function () {
        Route::post('/them', 'create')->name('create');
        Route::get('/detail', 'detail')->name('detail');
        Route::get('/', 'index')->name('index');
        Route::delete('/delete/{id}', 'delete')->name('delete');
    });
});



// Route::prefix('/cart')->as('cart.')->group(function () {
//     Route::get('/', function () {
//         return view('public.carts.index');
//     })->name('index');

//     Route::get('/detail', function () {
//         return view('public.carts.detail-cart');
//     })->name('detail');
// });
Route::prefix('/checkout')->as('checkout.')->group(function(){
    Route::controller(App\Http\Controllers\Checkout\CheckoutController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::post('/pay/{id}/{qtyy}', 'pay')->name('pay');
        Route::get('/fullcart', 'totalPrice')->name('total');
        Route::post('/paycart', 'payCart')->name('payCart');
    });
});

// Route::prefix('/checkout')->as('checkout.')->group(function () {
//     Route::get('/', function () {
//         return view('public.checkout.index');
//     })->name('index');
// });

Route::prefix('/wholesale')->name('wholesale.')->group(function () {
    Route::get('/', function () {
        return view('public.wholesale.index');
    })->name('index');
});
