<?php

use App\Http\Controllers\AkunController;
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
