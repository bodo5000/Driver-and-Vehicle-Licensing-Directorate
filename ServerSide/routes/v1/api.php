<?php
use Illuminate\Support\Facades\Route;


Route::prefix('v1/')->group(function () {
    require_once 'people.php';
});
