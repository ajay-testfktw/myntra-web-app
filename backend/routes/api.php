<?php

use App\Http\Controllers\Api\Auth\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::controller(AuthenticationController::class)->group(function () {
        Route::post('register', 'registerUser');
    });
});
