<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Devinweb\Payment\Facades\Payment;

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
    return view('form');
});

/**
 * ------------------
 * Form routes
 * ------------------
 */


Route::post('/submit-payment', function (Request $request) {

    $merchant_reference = Payment::use('payfort')->generateMerchantReference();

    return Payment::use('payfort', $merchant_reference)->pay();
});

Route::get('/callback-success', function (Request $request) {
    return view('success');
})->name('success');

Route::get('/callback-error', function (Request $request) {
    return view('error');
})->name('error');
