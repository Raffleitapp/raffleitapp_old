<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminRouteController;
use App\Http\Controllers\RaffleController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\FundraisingController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ImageUploadController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('v1')->group(function () {
    Route::post('uploadJson',[AdminRouteController::class,'saveMultiple']);

});


//mobile app section
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());
});


Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/login', [UserAuthController::class, 'login']);
Route::put('/update_register', [UserAuthController::class, 'update_register']);
Route::post('/logout', [UserAuthController::class, 'logout'])->middleware('auth:sanctum');


// Raffles API creation starts here
// Route::resource('/raffles', RaffleController::class);
Route::post('/saveRaffle', [RaffleController::class, 'createRaffle']);
// Route::post('/billAddress', [BillingAddressController::class, 'billAddress'])->name('user.billaddress');
// Route::post('/shipAddress', [ShippingAddressController::class, 'shipAddress'])->name('user.shipaddress');
Route::post('/create_organisation', [OrganisationController::class, 'CreateOrganisation']);
Route::post('/fundraising', [FundraisingController::class, 'fundraising']);
Route::post('/createraffle', [RaffleController::class, 'createRaffleMobile']);

// categories
Route::get('/categories', [CategoryController::class, 'fetch_category']);
Route::get('/raffles', [RaffleController::class, 'fetch_raffles']);
Route::get('/tickets', [RaffleController::class, 'fetch_tickets']);
// Route::get('/prices', [TicketPriceController::class, 'fetch_tickets']);

// Paypal payments
Route::post('/payment', [PayPalController::class, 'payment']);
Route::get('/success', [PayPalController::class, 'success'])->name('paypal.success');
Route::get('/failed', [PayPalController::class, 'failed'])->name('paypal.failed');

Route::post('/upload-image', [ImageUploadController::class, 'upload']);


// other APIS for app
Route::post('/payments/createStripeToken', [RaffleController::class, 'createStripeToken'])->name('payments.createStripeToken');

Route::get('organisation', function () {
    return view('organisation');
});
