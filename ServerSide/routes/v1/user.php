<?php

use App\Http\Controllers\V1\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->prefix('users')->middleware('jwt-auth')
    ->group(function () {
        Route::get('', 'index');
        Route::post('', 'create');
        Route::post('person/{nationalID}', 'createFromExistingPerson');
        Route::put('{id}/activation', 'updateUserActivation');
    });
