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

Route::post('/ubah_user/{id}', [App\Http\Controllers\HomeController::class, 'user_update'])->name('user.update');
Route::prefix('/penjualan')->group(function () {
    Route::get('/data', [App\Http\Controllers\AdminController::class, 'data_penjualan']);
    Route::get('/data_tanggal', [App\Http\Controllers\AdminController::class, 'data_penjualan_tanggal']);
    Route::get('/data_status', [App\Http\Controllers\AdminController::class, 'data_penjualan_status']);
});

Route::prefix('/master')->group(function () {
    Route::get('/customer', [App\Http\Controllers\AdminController::class, 'master_customer']);

    Route::group(['prefix' => '/provinsi'], function () {
        Route::get('/',  [App\Http\Controllers\AdminController::class, 'master_provinsi']);
        Route::get('/create',  [App\Http\Controllers\AdminController::class, 'create_provinsi'])->name('master.provinsi.tambah');
        Route::get('/edit/{id}',  [App\Http\Controllers\AdminController::class, 'edit_provinsi'])->name('master.provinsi.edit');
        Route::post('/store',  [App\Http\Controllers\AdminController::class, 'store_provinsi'])->name('master.provinsi.store');
        Route::post('/update/{id}',  [App\Http\Controllers\AdminController::class, 'update_provinsi'])->name('master.provinsi.update');
        Route::delete('/delete/', [App\Http\Controllers\AdminController::class, 'delete_provinsi'])->name('master.provinsi.delete');
    });

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
    Route::group(['prefix' => '/order'], function () {
        Route::get('/', [App\Http\Controllers\AdminController::class, 'order']);
        Route::get('/detail/{id}', [App\Http\Controllers\AdminController::class, 'detail_order'])->name('transaksi.order.detail');
        Route::get('/bayar/{id}', [App\Http\Controllers\AdminController::class, 'pembayaran_data'])->name('transaksi.order.bayar');
    });
});
