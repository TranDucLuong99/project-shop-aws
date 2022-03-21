<?php

use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Shop\CartController;
use App\Http\Controllers\Shop\PageController;
use App\Http\Controllers\Shop\ShopContactController;
use App\Http\Controllers\Shop\ShopFAQController;
use App\Http\Controllers\Shop\ShopProductController;
use App\Http\Controllers\Shop\ShopStoryController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
Auth::routes(['register' => false]);
Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function ($router) {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::group(['prefix' => 'content'], function (){
        Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('category/create',[CategoryController::class, 'getCreate'])->name('category.get_create');
        Route::post('category/create',[CategoryController::class, 'postCreate'])->name('category.category_create');
        Route::get('category/edit/{id}',[CategoryController::class, 'getEdit'])->name('category.get_edit');
        Route::post('category/edit/{id}',[CategoryController::class, 'postEdit'])->name('category.category_edit');
        Route::delete('category',[CategoryController::class, 'delete'])->name('category.delete');
        Route::patch('category',[CategoryController::class, 'restore'])->name('category.restore');

        Route::get('/product', [ProductController::class, 'index'])->name('product.index');
        Route::get('product/create',[ProductController::class, 'getCreate'])->name('product.get_create');
        Route::post('product/create',[ProductController::class, 'postCreate'])->name('product.product_create');
        Route::get('product/edit/{id}',[ProductController::class, 'getEdit'])->name('product.get_edit');
        Route::post('product/edit/{id}',[ProductController::class, 'postEdit'])->name('product.product_edit');
        Route::delete('product',[ProductController::class, 'delete'])->name('product.delete');
        Route::patch('product',[ProductController::class, 'restore'])->name('product.restore');

        Route::get('/new', [NewsController::class, 'index'])->name('new.index');
        Route::get('new/create',[NewsController::class, 'getCreate'])->name('new.get_create');
        Route::post('new/create',[NewsController::class, 'postCreate'])->name('new.new_create');
        Route::get('new/edit/{id}',[NewsController::class, 'getEdit'])->name('new.get_edit');
        Route::post('new/edit/{id}',[NewsController::class, 'postEdit'])->name('new.new_edit');
        Route::delete('new',[NewsController::class, 'delete'])->name('new.delete');
        Route::patch('new',[NewsController::class, 'restore'])->name('new.restore');

        Route::get('/banner', [BannerController::class, 'index'])->name('banner.index');
        Route::get('banner/create',[BannerController::class, 'getCreate'])->name('banner.get_create');
        Route::post('banner/create',[BannerController::class, 'postCreate'])->name('banner.banner_create');
        Route::get('banner/edit/{id}',[BannerController::class, 'getEdit'])->name('banner.get_edit');
        Route::post('banner/edit/{id}',[BannerController::class, 'postEdit'])->name('banner.banner_edit');
        Route::delete('banner',[BannerController::class, 'delete'])->name('banner.delete');
        Route::patch('banner',[BannerController::class, 'restore'])->name('banner.restore');

        Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
        Route::get('faq/create',[FaqController::class, 'getCreate'])->name('faq.get_create');
        Route::post('faq/create',[FaqController::class, 'postCreate'])->name('faq.faq_create');
        Route::get('faq/edit/{id}',[FaqController::class, 'getEdit'])->name('faq.get_edit');
        Route::post('faq/edit/{id}',[FaqController::class, 'postEdit'])->name('faq.faq_edit');
        Route::delete('faq',[FaqController::class, 'delete'])->name('faq.delete');
        Route::patch('faq',[FaqController::class, 'restore'])->name('faq.restore');

    });

    Route::group(['prefix' => 'order'], function (){
        Route::get('/order', [OrderController::class, 'index'])->name('order.index');
        Route::get('order/{id}',[OrderController::class, 'detail'])->name('order.detail');
        Route::group(['middleware' => 'checkAdmin'], function (){
            Route::get('print/{id}',[OrderController::class, 'printOrder'])->name('order.print');
            Route::get('/export', [OrderController::class, 'exportOrder'])->name('order.export');
        });
    });

    Route::group(['prefix' => 'file'], function (){
        Route::get('/file', [UploadFileController::class, 'index'])->name('file.index');
        Route::get('file/upload',[UploadFileController::class, 'getUpload'])->name('file.get_upload');
        Route::post('upload-secret', [UploadFileController::class, 'uploadFileEncrypt'])->name('file.upload');
        Route::get('decrytion-file/{id}', [UploadFileController::class, 'decryptFile'])->name('file.decrypt');
    });

    Route::group(['prefix' => 'user'], function (){
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
         Route::group(['middleware' => 'checkAdmin'], function (){
            Route::get('user/create',[UserController::class, 'getCreate'])->name('user.get_create');
            Route::post('user/create',[UserController::class, 'postCreate'])->name('user.user_create');
            Route::get('user/edit/{id}',[UserController::class, 'getEdit'])->name('user.get_edit');
            Route::post('user/edit/{id}',[UserController::class, 'postEdit'])->name('user.user_edit');
            Route::delete('user',[UserController::class, 'delete'])->name('user.delete');
            Route::patch('user',[UserController::class, 'restore'])->name('user.restore');
        });
    });
});

Route::group(['prefix' => 'Shop'], function () {
    Route::get('/home',[PageController::class, 'index'])->name('shop.home.index');
    Route::get('/sign-in',[PageController::class, 'signIn'])->name('shop.home.signIn');
    Route::post('/sign-in',[PageController::class, 'shopLogin'])->name('shop.home.shopLogin');
    Route::get('/sign-up',[PageController::class, 'signUp'])->name('shop.home.signUp');
    Route::post('/sign-up',[PageController::class, 'signUpUp'])->name('shop.home.signUpUp');
    Route::get('/product',[ShopProductController::class, 'index'])->name('shop.product.index');
    Route::get('/product/{id}',[ShopProductController::class, 'detail'])->name('shop.product.detail');
    Route::get('/checkout',[ShopProductController::class, 'checkout'])->name('shop.product.checkout');
    Route::get('/about',[ShopStoryController::class, 'index'])->name('shop.story.index');
    Route::get('/faq',[ShopFAQController::class, 'index'])->name('shop.faq.index');
    Route::get('/contact',[ShopContactController::class, 'index'])->name('shop.contact.index');
});


Route::get('/Add-Cart/{id}',[CartController::class, 'AddCart'])->name('addCart');
Route::post('/save-cart',[CartController::class, 'SaveCart'])->name('saveCart');
