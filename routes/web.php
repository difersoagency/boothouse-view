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

// Route::get('/bayar', [App\Http\Controllers\HomeController::class, 'getPayment']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/katalog', [App\Http\Controllers\HomeController::class, 'katalog'])->name('katalog');
Route::get('/cara-pesan', [App\Http\Controllers\HomeController::class, 'cara_pesan'])->name('cara_pesan');
Route::get('/detail-booth/{id}', [App\Http\Controllers\HomeController::class, 'detail_booth'])->name('detail_booth');
Route::get('/thankyou', [App\Http\Controllers\HomeController::class, 'thankyou'])->name('thankyou');

// Route::get('/katalog', function () {
//     return view('website.katalog');
// });

// Route::get('/cara-pesan', function () {
//     return view('website.cara');
// });


// Route::get('/detail-booth', function () {
//     return view('website.detail-booth');
// });

// Route::get('/login', function () {
//     return view('website.login');
// });

// Route::get('/register', function () {
//     return view('website.register');
// });

// Route::get('/thankyou', function () {
//     return view('website.thankyou');
// });

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
