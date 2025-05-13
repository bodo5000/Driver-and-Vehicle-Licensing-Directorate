<?php
use Illuminate\Support\Facades\Route;


Route::prefix('v1/')->group(function () {
    require_once 'auth.php';
    require_once 'people.php';
    require_once 'user.php';
    require_once 'application_type.php';
});
