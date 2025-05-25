<?php

namespace App\Repositories\LocalDrivingLicense;

use App\Models\LocalDrivingLicense;

class LocalDrivingLicenseRepository implements LocalDrivingLicenseInterface
{
    public function getAll()
    {
        return LocalDrivingLicense::all();
    }

    public function create(array $attributes)
    {
        return LocalDrivingLicense::create($attributes);
    }
}
