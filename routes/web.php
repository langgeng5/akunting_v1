<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\ArusKasController;
use App\Http\Controllers\BukuBesarController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\KasKeluarController;
use App\Http\Controllers\KasMasukController;
use App\Http\Controllers\LabaRugiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NeracaController;
use App\Http\Controllers\NeracaSaldoController;
use App\Http\Controllers\PerubahanModalController;
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
    return view('dashboard/index');
});

Route::get('/login', function () {
    return view('login');
});

Route::controller(LoginController::class)->group(function () {
    Route::post('/auth', 'authenticate');
    Route::get('/auth/logout', 'logout');
});

Route::controller(AkunController::class)->group(function () {
    Route::get('/akun', 'index')->middleware('auth');
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

Route::controller(BukuBesarController::class)->group(function () {
    Route::get('/buku-besar', 'index');
});

Route::controller(LabaRugiController::class)->group(function () {
    Route::get('/laba-rugi', 'index');
});

Route::controller(NeracaController::class)->group(function () {
    Route::get('/neraca', 'index');
});

Route::controller(NeracaSaldoController::class)->group(function () {
    Route::get('/neraca-saldo', 'index');
});

Route::controller(PerubahanModalController::class)->group(function () {
    Route::get('/perubahan-modal', 'index');
});

Route::controller(ArusKasController::class)->group(function () {
    Route::get('/arus-kas', 'index');
});
