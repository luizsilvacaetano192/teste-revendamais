<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AddressesController;

Route::prefix('v1')->group(function () {
    Route::apiResource('addresses', AddressesController::class)->except('show');
    Route::get('/addresses/search', [AddressesController::class, 'fuzzySearch']);
});

