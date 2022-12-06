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

Route::get('/', function () {
    return view('website.home');
});

Route::get('/katalog', function () {
    return view('website.katalog');
});

Route::get('/cara-pesan', function () {
    return view('website.cara');
});


Route::get('/detail-booth', function () {
    return view('website.detail-booth');
});

Route::get('/login', function () {
    return view('website.login');
});

Route::get('/register', function () {
    return view('website.register');
});

Route::get('/thankyou', function () {
    return view('website.thankyou');
});

Route::get('/custom', function () {
    return view('website.custom-booth');
});
