<?php

use App\Http\Controllers\V1\TestTypeController;
use Illuminate\Support\Facades\Route;

Route::controller(TestTypeController::class)->prefix('test_types')->middleware('jwt-auth')
    ->group(function () {
        Route::get('', 'index');
        Route::put('{id}', 'update');
    });
