<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'v1','middleware'=>'cors'],function(){
    Route::resource('pizze',\App\Http\Controllers\PizzaController::class);
    Route::resource('insalatone',\App\Http\Controllers\InsalatonaController::class);
    Route::get('commenti',[\App\Http\Controllers\CommentiController::class,'index']);
    Route::get('utenti',[\App\Http\Controllers\UtenteController::class,'index']);
    Route::get('voti',[\App\Http\Controllers\VotiController::class,'index']);
});
