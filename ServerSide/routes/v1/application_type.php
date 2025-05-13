<?php

use App\Http\Controllers\V1\ApplicationTypeController;
use Illuminate\Support\Facades\Route;

Route::controller(ApplicationTypeController::class)->prefix('application_types')->middleware('jwt-auth')
    ->group(function () {
        Route::get('', 'index');
        Route::put('{id}', 'update');
    });
