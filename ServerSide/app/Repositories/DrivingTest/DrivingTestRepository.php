<?php

namespace App\Repositories\DrivingTest;

use App\Models\DrivingTest;

class DrivingTestRepository implements DrivingTestInterface
{
    public function getDrivingTestByLocalDrivingAndTestType(int $localDrivingLicenseID, int $testTypeID, string $testResult = 'pass')
    {
        return DrivingTest::whereHas('drivingTestAppointment', function ($query) use ($localDrivingLicenseID, $testTypeID) {
            $query->where('local_driving_license_id', $localDrivingLicenseID)
                ->where('test_type_id', $testTypeID);
        })->where('result', $testResult)->first();
    }

    public function create(array $data)
    {
        return DrivingTest::create($data);
    }

    public function update(array $attributes, DrivingTest $drivingTest)
    {
        return $drivingTest->update($attributes);
    }

    public function findByID(string $id)
    {
        return DrivingTest::find($id);
    }
}
