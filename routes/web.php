<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NagadController;
use App\Http\Controllers\DBBLPaymentController;
use App\Http\Controllers\UCBPaymentController;
use App\Http\Controllers\SoutheastPaymentController;

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


Route::post('/', [DBBLPaymentController::class, 'completeTransaction'])->name('/');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//NAGAD
Route::get('/nagad/pay',[NagadController::class,'pay'])->name('nagad.pay');
Route::post('/nagad/callback', [NagadController::class,'callback']);
Route::get('/nagad/refund/{paymentRefId}', [NagadController::class,'refund']);

//paperless payment
Route::get('/paperless/payment', [App\Http\Controllers\PaymentController::class, 'paperless_payment'])->name('paperless_payment');

//DBBL
Route::get('/dbbl/payment',[DBBLPaymentController::class,'dbbl_payment'])->name('dbbl_payment');
Route::post('/dbbl/create-transaction', [DBBLPaymentController::class, 'createTransaction'])->name('createTransaction');
Route::post('/dbbl/complete-transaction', [DBBLPaymentController::class, 'completeTransaction']);

//UCB payment_confirmation
Route::get('/ucb/payment',[UCBPaymentController::class,'ucb_payment'])->name('ucb_payment');
Route::post('/ucb/payment_confirmation',[UCBPaymentController::class,'payment_confirmation'])->name('ucb_payment_confirmation');
Route::post('/ucb/ucb_payment_receipt',[UCBPaymentController::class,'ucb_payment_receipt'])->name('ucb_payment_receipt');

//Southeast Bank
Route::get('/southeast/payment',[SoutheastPaymentController::class,'southeast_payment'])->name('southeast_payment');
Route::post('/southeast/payment_confirmation',[SoutheastPaymentController::class,'payment_confirmation'])->name('southeast_payment_confirmation');
Route::get('/southeast/payment_confirmation',[SoutheastPaymentController::class,'callback']);


