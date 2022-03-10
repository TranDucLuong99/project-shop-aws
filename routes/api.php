<?php

use App\Http\Controllers\IAMController;
use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('list-users', [IAMController::class, 'listUsers']);
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [APIController::class, 'login'])->name('admin.login');
    Route::post('/register', [APIController::class, 'register']);
    Route::post('/logout', [APIController::class, 'logout']);
    Route::post('/refresh', [APIController::class, 'refresh']);
    Route::get('/user-profile', [APIController::class, 'userProfile']);
    Route::post('/change-pass', [APIController::class, 'changePassWord']);
    Route::get('/show-login', [APIController::class, 'ShowLoginForm']);
});
