<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(array('prefix'=>'admin','namespace'=>'Admin','middleware'=>'manager'), function(){
    Route::get('', [\App\Http\Controllers\HomeController::class,'index'])->name('home');
    Route::get('pizze',[\App\Http\Controllers\PizzaController::class,'index'])->name('pizze');
    Route::get('insalatone',[\App\Http\Controllers\InsalatonaController::class,'index'])->name('insalatone');
    Route::get('users',[\App\Http\Controllers\UtenteController::class,'index'])->name('users');
    Route::get('roles',[\App\Http\Controllers\RolesController::class,'index'])->name('roles');
    Route::get('roles/create',[\App\Http\Controllers\RolesController::class,'create']);
    Route::get('roles/create',[\App\Http\Controllers\RolesController::class,'store']);
});

