<?php

use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Service\UploadService;
use App\Models\Product;

Route::get('admin/users/login', [LoginController::class, 'index'])->name('admin.login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);
Route::post('admin/users/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::middleware(['admin.auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [MainAdminController::class, 'index'])->name('admin');
        Route::get('main', [MainAdminController::class, 'index']);

        # Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'list']);
            Route::get('edit/{menu}', [MenuController::class, 'edit']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::delete('destroy', [MenuController::class, 'destroy']);
        });
        #User
        Route::prefix('users')->group(function () {
            Route::get('list', [UserController::class, 'list']);
        });
        Route::prefix('orders')->group(function () {
            Route::get('list', [OrderAdminController::class, 'list']);
            Route::get('detail/{order}', [OrderAdminController::class, 'detail']);
        });
        # Product
        Route::prefix('product')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::delete('destroy', [ProductController::class, 'destroy']);
        });

        # Upload
        Route::post('upload/services', [UploadController::class, 'store']);
    });
});

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('products', [MainController::class, 'products'])->name('products');
Route::get('contact', [MainController::class, 'contact']);
Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\MainController::class, 'index'])->name('home');
Route::middleware(['auth.cart'])->group(function () {
    Route::post('add-cart', [CartController::class, 'index']);
    Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
    Route::post('update-cart', [CartController::class, 'update']);
    Route::get('carts/delete/{id}', [CartController::class, 'remove']);
    Route::post('checkout', [\App\Http\Controllers\OrderController::class, 'checkout']);
    Route::get('order', [\App\Http\Controllers\OrderController::class, 'order']);
    Route::get('order/{id}', [\App\Http\Controllers\OrderController::class, 'detail']);
});


