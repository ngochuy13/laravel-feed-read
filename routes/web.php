<?php

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

Route::get('/request', function () {
    return view('request-form');
});

Route::get('/assign-to-me', function () {
    return view('assign-to-me');
});

Route::get('/order-detail', function () {
    return view('order-detail');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Auth::routes();

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/home', function () {
    return view('dashboard');
});
