<?php
use App\Http\Controllers\V1\PersonController;
use Illuminate\Support\Facades\Route;


Route::controller(PersonController::class)->prefix('people')->group(function () {
    Route::get('', 'index');
    Route::post('', 'store');
    Route::get('{id}', 'show');
    Route::get('nationalNo/{national_no}', 'showByNationalNo');
    Route::put('{id}', 'update');
    Route::delete('{id}', 'destroy');
});
