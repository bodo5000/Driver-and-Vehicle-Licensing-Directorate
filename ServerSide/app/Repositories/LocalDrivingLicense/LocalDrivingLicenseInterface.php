<?php

namespace App\Repositories\LocalDrivingLicense;

interface LocalDrivingLicenseInterface
{

    public function getAll();
    public function create(array $attributes);
    public function checkExistingLicense(int $personID, int $licenseClassID, string $status = 'canceled');

}
