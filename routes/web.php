<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

Route::group(['prefix' => 'admin'], function (){
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create',[CategoryController::class, 'getCreate'])->name('category.get_create');
    Route::post('category/create',[CategoryController::class, 'postCreate'])->name('category.category_create');
    Route::get('category/edit/{id}',[CategoryController::class, 'getEdit'])->name('category.get_edit');
    Route::post('category/edit/{id}',[CategoryController::class, 'postEdit'])->name('category.category_edit');
    Route::delete('category',[CategoryController::class, 'delete'])->name('category.delete');
    Route::patch('category',[CategoryController::class, 'restore'])->name('category.restore');

    Route::get('/product', [CategoryController::class, 'index'])->name('product.index');
    Route::get('product/create',[CategoryController::class, 'getCreate'])->name('product.get_create');
    Route::post('product/create',[CategoryController::class, 'postCreate'])->name('product.category_create');
    Route::get('product/edit/{id}',[CategoryController::class, 'getEdit'])->name('product.get_edit');
    Route::post('product/edit/{id}',[CategoryController::class, 'postEdit'])->name('product.category_edit');
    Route::delete('product',[CategoryController::class, 'delete'])->name('product.delete');
    Route::patch('product',[CategoryController::class, 'restore'])->name('product.restore');
});