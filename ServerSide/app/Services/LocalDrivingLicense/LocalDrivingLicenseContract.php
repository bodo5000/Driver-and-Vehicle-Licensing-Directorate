<?php

namespace App\Services\LocalDrivingLicense;

use Illuminate\Http\Request;

interface LocalDrivingLicenseContract
{
    public function all();
    public function store(Request $request);
}
