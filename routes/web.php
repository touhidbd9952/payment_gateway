<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NagadController;
use App\Http\Controllers\DBBLPaymentController;

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

Route::get('/', function() {
    return view('welcome');
});

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::post('/', [DBBLPaymentController::class, 'completeTransaction']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/nagad/pay',[NagadController::class,'pay'])->name('nagad.pay');
Route::get('/nagad/callback', [NagadController::class,'callback']);
Route::get('/nagad/refund/{paymentRefId}', [NagadController::class,'refund']);

//paperless payment
Route::get('/paperless/payment', [App\Http\Controllers\PaymentController::class, 'paperless_payment'])->name('paperless_payment');
Route::post('/paperless/create-transaction', [App\Http\Controllers\PaymentController::class, 'paperless_createTransaction'])->name('paperless_createTransaction');

//DBBL
Route::get('/dbbl/payment',[DBBLPaymentController::class,'dbbl_payment'])->name('dbbl_payment');
Route::post('/dbbl/create-transaction', [DBBLPaymentController::class, 'createTransaction'])->name('createTransaction');
Route::post('/dbbl/complete-transaction', [DBBLPaymentController::class, 'completeTransaction']);
