<?php

use App\Http\Controllers\AdminRouteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
// Route::get("/", [AdminRouteController::class,"index"])->name("index");
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
Route::get('/about', function () {
    return view('about');
});
Route::get('/howitworks', function () {
    return view('howitwork');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('raffles', function () {
    return view('allraffle');
});


Route::get('/login', function () {
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

// Route::post('billaddress', function () {
//     return view('billaddress');
// });

Route::get('shipaddress', function () {
    return view('shipaddress');
});

Route::get('createraffle', function () {
    return view('createraffle');
});

// Route::get('raffles', function () {
//     return view('raffles');
// });

Route::get('organisation', function () {
    return view('organisation');
});



Route::get('fundraise', function () {
    return view('fundraise');
});
Route::post('create_account', [UserAuthController::class, 'createAccount'])->name('create_account');
Route::get('complete_register', [UserAuthController::class, 'complete_register'])->name('complete_register');
Route::post('update_register', [UserAuthController::class, 'update_register'])->name('update_register');
Route::post('login_login', [UserAuthController::class, 'loginAccount'])->name('login_login');
Route::get('logout', [UserAuthController::class, 'logout'])->name('logout');


Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminRouteController::class, 'index']);
    Route::get('dashboard', [AdminRouteController::class, 'index'])->name('admin.dashboard');
    Route::get('users', [AdminRouteController::class, 'users'])->name('admin.users');
    Route::get('admins', [AdminRouteController::class, 'admins'])->name('admin.admins');
    Route::get('category', [AdminRouteController::class, 'category'])->name('admin.category');
    Route::post('addCategory', [AdminRouteController::class, 'saveCategory']);
});

Route::group(['prefix' => 'user'], function () {
    Route::get('dashboard', [UserAuthController::class, 'dashboard'])->name('user.dashboard');
    Route::get('create_step', [UserAuthController::class, 'walkthrough'])->name('user.create_step');
    Route::get('choose_organisation', [UserAuthController::class, 'chooseOrganisation'])->name('user.choose_organisation');
    Route::post('admin/save_organisation', [UserAuthController::class, 'save_organisation']);
    Route::get('addresses', [UserAuthController::class, 'address']);
    Route::post('billaddress', [UserAuthController::class, 'billAddress']);

});
