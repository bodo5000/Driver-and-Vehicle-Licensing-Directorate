<?php

namespace App\Repositories\LocalDrivingLicense;

use App\Models\LocalDrivingLicense;
use Illuminate\Support\Facades\DB;

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

    public function checkExistingLicense(int $personID, int $licenseClassID, string $status = 'canceled')
    {
        return DB::select('SELECT * FROM applications INNER JOIN
             local_driving_licenses ON applications.id = local_driving_licenses.application_id
              WHERE applications.person_id =? AND license_class_id =? AND applications.status !=? LIMIT 1',
            [$personID, $licenseClassID, $status]
        );
    }
}
