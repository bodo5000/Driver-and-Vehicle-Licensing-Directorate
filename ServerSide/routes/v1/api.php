<?php
use Illuminate\Support\Facades\Route;


Route::prefix('v1/')->group(function () {
    require_once 'auth.php';
    require_once 'people.php';
    require_once 'user.php';
    require_once 'application_type.php';
    require_once 'test_type.php';
    require_once 'local_driving_license.php';
    require_once 'application.php';
    require_once 'driving_test_appointment.php';
    require_once 'driving_test.php';
});
