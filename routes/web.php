<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\User\AjaxController;
use App\Http\Controllers\User\UserController;

//Login / Register
Route::middleware(['admin_auth'])->group(function () {
    Route::redirect('/', 'loginPage');
    Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');
    Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');

});

// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

// only login user are can call this route!
Route::middleware(['auth'])->group(function () {

    //dashboard
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    //Admin // only login user is admin, this route can call
    Route::middleware(['admin_auth'])->group(function () {
        //category
        Route::prefix('category')->group(function () {
            Route::get('list', [CategoryController::class, 'list'])->name('category#list');
            Route::get('create/page', [CategoryController::class, 'createPage'])->name('category#createPage');
            Route::post('create', [CategoryController::class, 'create'])->name('category#create');
            Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category#edit');
            Route::post('update/{id}', [CategoryController::class, 'update'])->name('category#update');
        });

        //admin account
        Route::prefix('admin')->group(function () {
            //password
            Route::get('password/changePage', [AdminController::class, 'changePasswordPage'])->name('admin#changePasswordPage');
            Route::post('change/password', [AdminController::class, 'changePassword'])->name('admin#changePassword');

            //profile routes
            Route::get('details', [AdminController::class, 'details'])->name('admin#details');
            Route::get('edit', [AdminController::class, 'edit'])->name('admin#edit');
            Route::post('update/{id}', [AdminController::class, 'update'])->name('admin#update');
            Route::get('list', [AdminController::class, 'list'])->name('admin#list');
            Route::get('delete/{id}', [AdminController::class, 'delete'])->name('admin#delete');
            Route::get('changeRole/{id}', [AdminController::class, 'changeRole'])->name('admin#changeRole');
            Route::post('change/role/{id}', [AdminController::class, 'change'])->name('admin#change');
            Route::get('account/list', [AdminController::class,'accountList'])->name('admin#accountList');
            Route::get('ajax/account/role/change', [AdminController::class,'ajaxAccountRoleChange'])->name('admin#ajaxAccountRoleChange');

        });
        //product
        Route::prefix('product')->group(function () {
            Route::get('list', [ProductController::class, 'list'])->name('product#list');
            Route::get('create', [ProductController::class, 'createPage'])->name('product#createPage');
            Route::post('create', [ProductController::class, 'create'])->name('product#create');
            Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product#delete');
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product#edit');
            Route::get('updatePage/{id}', [ProductController::class, 'updatePage'])->name('product#updatePage');
            Route::post('update', [ProductController::class, 'update'])->name('product#update');

        });
        Route::prefix('order')->group(function () {
            Route::get('list', [OrderController::class, 'list'])->name('order#list');
            Route::get('change/status', [OrderController::class, 'changeStatus'])->name('order#changeStatus');
            Route::get('ajax/change/status',[OrderController::class,'ajaxChangeStatus'])->name('admin#ajaxChangeStatus');
            Route::get('listInfo/{id}', [OrderController::class,'listInfo'])->name('order#listInfo');
        });
        Route::prefix('customer')->group(function () {
            Route::get('getReview',[ContactController::class,'getReview'])->name('customer#getReview');
            Route::get('contact/details/{id}',[ContactController::class,'contactDetails'])->name('customer#contactDetails');
            Route::get('reply/page/{id}',[ContactController::class,'replyPage'])->name('customer#replyPage');
            Route::get('delete/{id}',[ContactController::class,'delete'])->name('customer#delete');

        });

    });


    //user
    //category
    // only login user is user, this route can call
    Route::group(['prefix' => 'user', 'middleware' => 'user_auth'], function () {
        Route::get('/homePage', [UserController::class, 'home'])->name('user#homePage');
        Route::get('filter/{id}', [UserController::class, 'filter'])->name('user#filter');
        Route::get('history', [UserController::class, 'history'])->name('user#history');

        Route::prefix('pizza')->group(function () {
            Route::get('details/{id}', [UserController::class, 'pizzaDetails'])->name('user#pizzaDetails');
        });
        Route::prefix('password')->group(function () {
            Route::get('change', [UserController::class, 'changePassword'])->name('user#changePasswordPage');
            Route::post('change', [UserController::class, 'change'])->name('user#changePassword');
        });

        Route::prefix('account')->group(function () {
            Route::get('details', [UserController::class, 'details'])->name('account#details');
            Route::post('update/{id}', [UserController::class, 'update'])->name('account#update');
        });

        Route::prefix('ajax')->group(function () {
            Route::get('pizza/list', [AjaxController::class, 'pizzaList'])->name('ajax#pizzaList');
            Route::get('addToCart', [AjaxController::class, 'addCart'])->name('ajax#addToCart');
            Route::get('order', [AjaxController::class, 'order'])->name('ajax#order');
            Route::get('clear/cart', [AjaxController::class, 'clearCart'])->name('ajax#clearCart');
            Route::get('clear/current/product', [AjaxController::class, 'clearCurrentProduct'])->name('clearCurrentProduct');
            Route::get('increase/viewCount', [AjaxController::class,'increaseViewCount'])->name('ajax#increaseViewCount');
        });

        Route::prefix('cart')->group(function () {
            Route::get('list', [UserController::class, 'cartList'])->name('user#cartList');
        });
        Route::prefix('contact')->group(function () {
            Route::get('form',[ContactController::class,'form'])->name('contact#form');
            Route::post('send/message' , [ContactController::class,'sendMessage'])->name('contact#sendMessage');
        });
    });

});


