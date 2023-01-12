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


Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
});

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::post('/payToken', [App\Http\Controllers\MidtransController::class, 'getSnapToken']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/katalog', [App\Http\Controllers\HomeController::class, 'katalog'])->name('katalog');
Route::get('/katalog/{value}', [App\Http\Controllers\HomeController::class, 'katalog_filter'])->name('katalog_filter');
Route::get('/katalog_data', [App\Http\Controllers\HomeController::class, 'katalog_data'])->name('katalog');
Route::get('/cara-pesan', [App\Http\Controllers\HomeController::class, 'cara_pesan'])->name('cara_pesan');
Route::get('/detail-booth/{id}', [App\Http\Controllers\HomeController::class, 'detail_booth'])->name('detail_booth');


//Customer
Route::group(['middleware' => ['auth', 'role:customer']], function () {
    Route::get('/pesanan', function () {
        return view('website.detail-pembayaran');
    });
    Route::get('/thankyou', [App\Http\Controllers\HomeController::class, 'thankyou'])->name('thankyou');
    Route::get('/status', [App\Http\Controllers\HomeController::class, 'status']);
    Route::post('/checkout', [App\Http\Controllers\HomeController::class, 'checkout']);
    Route::get('/custom', function () {
        return view('website.custom-booth');
    });
});



//Admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::group(['prefix' => '/admin'], function () {
        Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
    });
    Route::group(['prefix' => '/master'], function () {
        Route::view('/customer', 'admin.master.customer')->name('master.customer');
        Route::view('/provinsi', 'admin.master.provinsi')->name('master.provinsi');
        Route::view('/booth', 'admin.master.booth')->name('master.booth');
        Route::view('/kota', 'admin.master.kota')->name('master.kota');
    });
    Route::group(['prefix' => '/transaksi'], function () {
        Route::view('/order', 'admin.transaksi.order')->name('transaksi.order');
    });
});






//List Data
Route::get('/provinsi/{id}', [App\Http\Controllers\HomeController::class, 'selectprovinsi']);
Route::get('/kota/{id}', [App\Http\Controllers\HomeController::class, 'selectkota']);
