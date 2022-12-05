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

Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/katalog', [App\Http\Controllers\HomeController::class, 'katalog'])->name('katalog');
Route::get('/cara-pesan', [App\Http\Controllers\HomeController::class, 'cara_pesan'])->name('cara_pesan');
Route::get('/detail-booth', [App\Http\Controllers\HomeController::class, 'detail_booth'])->name('detail_booth');
Route::get('/thankyou', [App\Http\Controllers\HomeController::class, 'thankyou'])->name('thankyou');
