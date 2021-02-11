<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/', [LoginController::class, 'index'])->name('home');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::group(['prefix' => 'panel','middleware' => 'auth'], function () {
    Route::get('/guest', [LoginController::class, 'guest'])->name('guest');
    Route::get('/admin', [LoginController::class, 'admin'])->name('admin');
    Route::get('/user', [LoginController::class, 'user'])->name('user');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

