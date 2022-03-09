<?php

use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

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

});

Route::group(['prefix' => 'order'], function (){
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('order/{id}',[OrderController::class, 'detail'])->name('order.detail');
    Route::get('print/{id}',[OrderController::class, 'printOrder'])->name('order.print');
    // Route::get('/order-report', [OrderController::class, 'index'])->name('order.index');
});

Route::group(['prefix' => 'user'], function (){
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('user/create',[UserController::class, 'getCreate'])->name('user.get_create');
    Route::post('user/create',[UserController::class, 'postCreate'])->name('user.user_create');
    Route::get('user/edit/{id}',[UserController::class, 'getEdit'])->name('user.get_edit');
    Route::post('user/edit/{id}',[UserController::class, 'postEdit'])->name('user.user_edit');
    Route::delete('user',[UserController::class, 'delete'])->name('user.delete');
    Route::patch('user',[UserController::class, 'restore'])->name('user.restore');
});


