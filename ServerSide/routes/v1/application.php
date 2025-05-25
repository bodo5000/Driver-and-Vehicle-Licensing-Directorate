<?php

use App\Http\Controllers\V1\Applications\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::controller(ApplicationController::class)->prefix('applications')->middleware('jwt-auth')
    ->group(function () {
        Route::get('', 'index');
        Route::post('', 'store');
    });
