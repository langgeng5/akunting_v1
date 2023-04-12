<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\KasKeluarController;
use App\Http\Controllers\KasMasukController;
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
    Route::get('/akun/edit/{id}', 'edit');
    Route::put('/akun/edit/{id}', 'update');
    Route::delete('/akun/delete/{id}', 'delete');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index');
    Route::get('/user/create', 'create');
    Route::post('/user/create', 'store');
    Route::get('/user/edit/{id}', 'edit');
    Route::put('/user/edit/{id}', 'update');
    Route::delete('/user/delete/{id}', 'delete');
});

Route::controller(KasMasukController::class)->group(function () {
    Route::get('/kas-masuk', 'index');
    Route::get('/kas-masuk/create', 'create');
    Route::post('/kas-masuk/create', 'store');
    Route::get('/kas-masuk/edit/{id}', 'edit');
    Route::put('/kas-masuk/edit/{id}', 'update');
    Route::delete('/kas-masuk/delete/{id}', 'delete');
});

Route::controller(KasKeluarController::class)->group(function () {
    Route::get('/kas-keluar', 'index');
    Route::get('/kas-keluar/create', 'create');
    Route::post('/kas-keluar/create', 'store');
    Route::get('/kas-keluar/edit/{id}', 'edit');
    Route::put('/kas-keluar/edit/{id}', 'update');
    Route::delete('/kas-keluar/delete/{id}', 'delete');
});

Route::controller(JurnalController::class)->group(function () {
    Route::get('/jurnal', 'index');
});
