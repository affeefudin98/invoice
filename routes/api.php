<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyApi;
use App\Http\Controllers\ProductApi;
use App\Http\Controllers\PaymethodApi;
use App\Http\Controllers\InvoiceApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function(){
    Route::get("companies", [CompanyApi::class, 'getData']);
    Route::get("products", [ProductApi::class, 'getData']);
    Route::get("paymethods", [PaymethodApi::class, 'getData']);
    Route::get("invoices", [InvoiceApi::class, 'getData']);
});

//Route::get("companies", [CompanyApi::class, 'getData']);

