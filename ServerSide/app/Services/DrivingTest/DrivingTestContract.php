<?php

namespace App\Services\DrivingTest;

use Illuminate\Http\Request;

interface DrivingTestContract
{
    public function getDrivingTestByLocalDrivingAndTestType(int $localDrivingLicenseID, int $testTypeID, string $testResult = 'pass');
    public function store(int $testAppointmentID);
    public function updateTestResult(Request $request, string $id);
    public function findById(string $id);
}
