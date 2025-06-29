<?php

namespace App\Repositories\DrivingTest;

use App\Models\DrivingTest;

interface DrivingTestInterface
{
    public function getDrivingTestByLocalDrivingAndTestType(int $localDrivingLicenseID, int $testTypeID, string $testResult = 'pass');
    public function create(array $data);
    public function update(array $attributes, DrivingTest $drivingTest);
    public function findByID(string $id);
}
