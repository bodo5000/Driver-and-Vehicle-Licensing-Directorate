<?php

use App\Http\Controllers\V1\Applications\LocalDrivingLicenseController;
use Illuminate\Support\Facades\Route;

Route::controller(LocalDrivingLicenseController::class)->prefix('local_driving')->middleware('jwt-auth')
    ->group(function () {
        Route::get('', 'index');
        Route::post('', 'store');
    });
