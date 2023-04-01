<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main_layout');
});

Route::get('/login', function () {
    return view('login');
});

Route::controller(AkunController::class)->group(function () {
    Route::get('/akun', 'index');
    Route::get('/akun/create', 'create');
    Route::post('/akun/create', 'store');
    Route::get('/akun/{id}', 'show');
    Route::get('/akun/edit/{id}', 'edit');
    Route::put('/akun/edit/{id}', 'update');
    Route::delete('/akun/delete/{id}', 'delete');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index');
    Route::get('/user/create', 'create');
    Route::post('/user/create', 'store');
    Route::get('/user/{id}', 'show');
    Route::get('/user/edit/{id}', 'edit');
    Route::put('/user/edit/{id}', 'update');
    Route::delete('/user/delete/{id}', 'delete');
});
