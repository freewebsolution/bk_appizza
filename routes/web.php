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
    Route::get('/insalatone',[\App\Http\Controllers\InsalatonaController::class,'index'])->name('insalatone');
    Route::get('/users',[\App\Http\Controllers\UtenteController::class,'index'])->name('users');
    Route::get('/users/{id?}/edit',[\App\Http\Controllers\UtenteController::class,'edit']);
    Route::post('/users/{id?}/edit',[\App\Http\Controllers\UtenteController::class,'update']);
    Route::get('/roles',[\App\Http\Controllers\RolesController::class,'index'])->name('roles');
    Route::get('/roles/create',[\App\Http\Controllers\RolesController::class,'create']);
    Route::post('/roles/create',[\App\Http\Controllers\RolesController::class,'store']);
});

