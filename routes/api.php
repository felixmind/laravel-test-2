<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:api', 'action.log'])->group(function () {
    Route::apiResource('clients', 'ClientController');
    Route::apiResource('clients.phones', 'ClientPhoneController');
    Route::apiResource('clients.emails', 'ClientEmailController');
});
