<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//register info send email

Route::post('/register-info-send-email', [App\Api\V1\Http\Controllers\RegisterInfoSendEmailController::class, 'sendMail'])->name('register_info_send_email');


//setting
Route::controller(App\Api\V1\Http\Controllers\Setting\SettingController::class)
->prefix('/setting')
->as('setting.')
->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/show/{setting_key}', 'show')->name('show');
});

//slider
Route::controller(App\Api\V1\Http\Controllers\Slider\SliderController::class)
->prefix('/slider')
->as('slider.')
->group(function(){
    Route::get('/show/{key}', 'show')->name('show');
});

//product wishlist
Route::controller(App\Api\V1\Http\Controllers\Product\ProductWishlistController::class)
->middleware('auth:sanctum')
->prefix('/product-wishlist')
->as('product_wishlist.')
->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
    Route::post('/remove', 'remove')->name('remove');
});

Route::controller(App\Api\V1\Http\Controllers\Order\OrderController::class)
->middleware('auth:sanctum')
->prefix('/order')
->as('order.')
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
    Route::put('/cancel', 'cancel')->name('cancel');
    Route::get('/show/{id}', 'show')->name('show');
    Route::delete('/delete/{id}', 'delete')->name('delete');
});

Route::controller(App\Api\V1\Http\Controllers\ShoppingCart\ShoppingCartController::class)
->middleware('auth:sanctum')
->prefix('/shopping-cart')
->as('shopping_cart.')
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
    Route::put('/update', 'update')->name('update');
    Route::delete('/delete', 'delete')->name('delete');
});

//product category
Route::prefix('/product-category')
->as('product_category.')
->group(function () {
    Route::controller(App\Api\V1\Http\Controllers\ProductCategory\ProductCategoryController::class)
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/show/{id}', 'show')->name('show');
    });
});

//review product
Route::controller(App\Api\V1\Http\Controllers\Review\ReviewController::class)
->prefix('/reviews')
->as('review.')
->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/store', 'store')->name('store')->middleware('auth:sanctum');
});

//product
Route::prefix('/product')
->as('product.')
->group(function () {
    Route::controller(App\Api\V1\Http\Controllers\Product\ProductController::class)
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/show/{id}', 'show')->name('show');
    });
});

//category
Route::controller(App\Api\V1\Http\Controllers\Category\CategoryController::class)
->prefix('/categories')
->as('category.')
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/show/{id}', 'show')->name('show');
});


//posts
Route::controller(App\Api\V1\Http\Controllers\Post\PostController::class)
->prefix('/posts')
->as('post.')
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/related/{id}', 'related')->name('related');
});

//pages
Route::controller(App\Api\V1\Http\Controllers\Page\PageController::class)
->prefix('/pages')
->as('page.')
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/show/{id_or_slug}', 'show')->name('show');
});

//auth
Route::controller(App\Api\V1\Http\Controllers\Auth\AuthController::class)
->group(function () {
    Route::middleware('auth:sanctum')->prefix('/auth')->as('auth.')->group(function(){
        Route::get('/', 'show')->name('show');
        Route::put('/', 'update')->name('update');
        Route::put('/update-password', 'updatePassword')->name('update_password');
    });
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
});

Route::controller(App\Api\V1\Http\Controllers\Auth\ResetPasswordController::class)
->prefix('/reset-password')
->as('reset_password.')
->group(function(){
    Route::post('/', 'checkAndSendMail')->name('check_and_send_mail');
});

Route::fallback(function(){
    return response()->json([
        'status' => 404,
        'message' => __('Không tìm thấy đường dẫn.')
    ], 404);
});