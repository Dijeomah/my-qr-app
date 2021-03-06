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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])
    ->name('admin.home')
    ->middleware('is_admin');

Route::get('/qr-code', [App\Http\Controllers\Qr\QrController::class, 'index'])->name('qr.home');
Route::post('/show-code', [App\Http\Controllers\Qr\QrController::class, 'checkQr'])->name('qr.create');
