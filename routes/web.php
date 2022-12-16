<?php

use App\Http\Middleware\CekRole;
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

Auth::routes();

Route::get('/', function () {
    return view('website.home');
});

//Route::get('/bayar', [App\Http\Controllers\HomeController::class, 'getPayment']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::post('/payToken', [App\Http\Controllers\MidtransController::class, 'getSnapToken']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/katalog', [App\Http\Controllers\HomeController::class, 'katalog'])->name('katalog');
Route::get('/katalog/{value}', [App\Http\Controllers\HomeController::class, 'katalog_filter'])->name('katalog_filter');
Route::get('/katalog_data', [App\Http\Controllers\HomeController::class, 'katalog_data'])->name('katalog');
Route::get('/cara-pesan', [App\Http\Controllers\HomeController::class, 'cara_pesan'])->name('cara_pesan');
Route::get('/detail-booth/{id}', [App\Http\Controllers\HomeController::class, 'detail_booth'])->name('detail_booth');
Route::get('/thankyou', [App\Http\Controllers\HomeController::class, 'thankyou'])->name('thankyou');

Route::get('/custom', function () {
    return view('website.custom-booth');
});

Route::group(['prefix' => '/admin', 'middleware' => ['auth']], function () {
    Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/pesanan', function () {
        return view('website.detail-pembayaran');
    });
    Route::post('/checkout', [App\Http\Controllers\HomeController::class, 'checkout']);
});

Route::get('/status', function () {
    return view('website.status-pesanan');
});

Route::group(['prefix' => '/master', 'middleware' => ['auth']], function () {
    Route::view('/customer', 'admin.master.customer')->name('master.customer');
    Route::view('/kota', 'admin.master.kota')->name('master.kota');
    Route::view('/provinsi', 'admin.master.provinsi')->name('master.provinsi');
});

//List Data
Route::get('/provinsi/{id}', [App\Http\Controllers\HomeController::class, 'selectprovinsi']);
Route::get('/kota/{id}', [App\Http\Controllers\HomeController::class, 'selectkota']);


//Tes Session
// Route::get('/step1', [App\Http\Controllers\HomeController::class, 'step1']);
// Route::get('/step2', [App\Http\Controllers\HomeController::class, 'step2']);
// Route::get('/step3', [App\Http\Controllers\HomeController::class, 'step3']);
// Route::get('/selesai', [App\Http\Controllers\HomeController::class, 'selesai']);
