<?php

use App\Http\Controllers\AuthController;
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


Route::group(['prefix' => 'v1', 'middleware' => 'cors'], function () {
    Route::resource('pizze', \App\Http\Controllers\api\PizzaApiController::class);
    Route::resource('insalatone', \App\Http\Controllers\api\InsalatonaApiController::class);
    Route::resource('commenti', \App\Http\Controllers\api\CommentiApiController::class);
    Route::resource('utenti', \App\Http\Controllers\api\UtentiApiController::class,);
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login'])->name('api.login');
    Route::post('/register', [AuthController::class, 'register'])->name('api.register');;
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');;
    Route::post('/refresh', [AuthController::class, 'refresh'])->name('api.refresh');;
    Route::get('/user-profile', [AuthController::class, 'userProfile'])->name('api.user-profile');;
});


