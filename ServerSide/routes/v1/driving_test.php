<?php

use App\Http\Controllers\V1\DrivingTestController;
use Illuminate\Support\Facades\Route;

Route::controller(DrivingTestController::class)->prefix('driving_test')
    ->middleware('jwt-auth')
    ->group(function () {
        Route::put('{id}', 'update');
    });