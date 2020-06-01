<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Devinweb\Payment\Facades\Payment;
use Illuminate\Support\Facades\View;


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

Route::get('/{provider}/callback-success', function ($provider) {
    if ($provider == 'hyperpay') {
        return view('hyperpay.success');
    }
    return view('payfort.success');
});

Route::get('/{provider}/callback-error', function ($provider) {
    if ($provider == 'hyperpay') {
        return view('hyperpay.error');
    }
    return view('payfort.error');
});

Route::post('/{provider}/submit-payment', function ($provider) {
    $merchant_reference =  rand(0, getrandmax());
    return Payment::use($provider, $merchant_reference)->pay();
});
