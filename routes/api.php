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


Route::get('/coba', [App\Http\Controllers\MidtransController::class, 'getSnapToken']);
Route::prefix('/penjualan')->group(function () {
    Route::get('/data', [App\Http\Controllers\AdminController::class, 'data_penjualan']);
    Route::get('/data_tanggal', [App\Http\Controllers\AdminController::class, 'data_penjualan_tanggal']);
    Route::get('/data_status', [App\Http\Controllers\AdminController::class, 'data_penjualan_status']);
});

Route::prefix('/master')->group(function () {
    Route::get('/kota', [App\Http\Controllers\AdminController::class, 'master_kota']);
    Route::get('/customer', [App\Http\Controllers\AdminController::class, 'master_customer']);
    Route::get('/provinsi', [App\Http\Controllers\AdminController::class, 'master_provinsi']);
});


