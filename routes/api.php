<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/penjualan')->group(function () {
    Route::get('/data', [App\Http\Controllers\AdminController::class, 'data_penjualan']);
    Route::get('/data_tanggal', [App\Http\Controllers\AdminController::class, 'data_penjualan_tanggal']);
    Route::get('/data_status', [App\Http\Controllers\AdminController::class, 'data_penjualan_status']);
});

Route::prefix('/master')->group(function () {
    Route::get('/customer', [App\Http\Controllers\AdminController::class, 'master_customer']);
    Route::get('/provinsi', [App\Http\Controllers\AdminController::class, 'master_provinsi']);


    Route::group(['prefix' => '/kota'], function () {
        Route::get('/',  [App\Http\Controllers\AdminController::class, 'master_kota'])->name('master.kota');
        Route::get('/create',  [App\Http\Controllers\AdminController::class, 'create_kota'])->name('master.kota.tambah');
        Route::get('/edit/{id}',  [App\Http\Controllers\AdminController::class, 'edit_kota'])->name('master.kota.edit');
        Route::post('/store',  [App\Http\Controllers\AdminController::class, 'store_kota'])->name('master.kota.store');
        Route::post('/update/{id}',  [App\Http\Controllers\AdminController::class, 'update_kota'])->name('master.kota.update');
        Route::delete('/delete/', [App\Http\Controllers\AdminController::class, 'delete_kota'])->name('master.kota.delete');
    });

    Route::group(['prefix' => '/booth'], function () {
        Route::get('/', [App\Http\Controllers\AdminController::class, 'master_booth']);
        Route::get('/create',  [App\Http\Controllers\AdminController::class, 'create_booth'])->name('master.booth.tambah');
        Route::post('/store',  [App\Http\Controllers\AdminController::class, 'store_booth'])->name('master.booth.store');
        Route::get('/edit/{id}',  [App\Http\Controllers\AdminController::class, 'edit_booth'])->name('master.booth.edit');
        Route::post('/update/{id}',  [App\Http\Controllers\AdminController::class, 'update_booth'])->name('master.booth.update');
        Route::delete('/delete/', [App\Http\Controllers\AdminController::class, 'delete_booth'])->name('master.booth.delete');
    });
});

Route::prefix('/transaksi')->group(function () {
    Route::get('/order', [App\Http\Controllers\AdminController::class, 'order']);
});
