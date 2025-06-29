<?php

use App\Http\Controllers\V1\DrivingTestAppointmentController;
use Illuminate\Support\Facades\Route;

Route::controller(DrivingTestAppointmentController::class)->prefix('driving_test_appointment')->middleware('jwt-auth')->group(function () {
    Route::get('', 'index');
    Route::post('', 'store');
});
