<?php

use Illuminate\Support\Facades\Auth;
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
    return view('frontend.home');
});
Route::get('home', function () {
    return view('frontend.home');
});
Auth::routes();
//Auth::routes([
//    'register' => false, // Registration Routes...
//    'reset' => false, // Password Reset Routes...
//    'verify' => false, // Email Verification Routes...
//]);
if (!env('ALLOW_REGISTRATION', false)) {
    Route::any('/register', function() {
        abort(403);
    });
}

Route::group(array('prefix'=>'admin','namespace'=>'Admin','middleware'=>'manager'), function(){
    Route::get('', [\App\Http\Controllers\HomeController::class,'index'])->name('home');
    Route::get('/home', [\App\Http\Controllers\HomeController::class,'index'])->name('home');
    Route::get('/pizze',[\App\Http\Controllers\PizzaController::class,'index'])->name('pizze');
    Route::get('/pizze/{id?}/delete',[\App\Http\Controllers\PizzaController::class,'destroy']);
    Route::get('/pizze/{id?}/edit',[\App\Http\Controllers\PizzaController::class,'edit']);
    Route::post('/pizze/{id?}/edit',[\App\Http\Controllers\PizzaController::class,'update']);
    Route::get('/pizze/create',[\App\Http\Controllers\PizzaController::class,'create']);
    Route::post('/pizze/create',[\App\Http\Controllers\PizzaController::class,'store']);
    Route::get('/insalatone',[\App\Http\Controllers\InsalatonaController::class,'index'])->name('insalatone');
    Route::get('/insalatone/{id?}/delete',[\App\Http\Controllers\InsalatonaController::class,'destroy']);
    Route::get('/insalatone/{id?}/edit',[\App\Http\Controllers\InsalatonaController::class,'edit']);
    Route::post('/insalatone/{id?}/edit',[\App\Http\Controllers\InsalatonaController::class,'update']);
    Route::get('/insalatone/create',[\App\Http\Controllers\InsalatonaController::class,'create']);
    Route::post('/insalatone/create',[\App\Http\Controllers\InsalatonaController::class,'store']);
    Route::get('/users',[\App\Http\Controllers\UtenteController::class,'index'])->name('users');
    Route::get('/users/create',[\App\Http\Controllers\UtenteController::class,'create']);
    Route::post('/users/create',[\App\Http\Controllers\UtenteController::class,'store']);
    Route::get('/users/{id?}/edit',[\App\Http\Controllers\UtenteController::class,'edit']);
    Route::post('/users/{id?}/edit',[\App\Http\Controllers\UtenteController::class,'update']);
    Route::get('/users/{id?}/delete',[\App\Http\Controllers\UtenteController::class,'destroy']);
    Route::get('/roles',[\App\Http\Controllers\RolesController::class,'index'])->name('roles');
    Route::get('/roles/create',[\App\Http\Controllers\RolesController::class,'create']);
    Route::post('/roles/create',[\App\Http\Controllers\RolesController::class,'store']);
});

