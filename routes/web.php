<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('dashboard', function () {
    return view('dashboard');
});

Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

Route::get('yourself', function () {
    return view('yourself');
});

Route::get('accdetails', function () {
    return view('accdetails');
});

Route::get('addresses', function () {
    return view('addresses');
});

Route::get('billaddress', function () {
    return view('billaddress');
});

Route::get('shipaddress', function () {
    return view('shipaddress');
});

Route::get('raffles', function () {
    return view('raffles');
});

Route::get('organisation', function () {
    return view('organisation');
});
