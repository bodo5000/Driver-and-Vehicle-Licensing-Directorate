<?php

namespace App\Services\DrivingTest;

use App\Repositories\DrivingTest\DrivingTestInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DrivingTestService implements DrivingTestContract
{

    public function __construct(protected DrivingTestInterface $drivingTestRepository)
    {
    }

    public function getDrivingTestByLocalDrivingAndTestType(int $localDrivingLicenseID, int $testTypeID, string $testResult = 'pass')
    {
        return $this->drivingTestRepository->getDrivingTestByLocalDrivingAndTestType($localDrivingLicenseID, $testTypeID, $testResult);
    }

    public function store(int $testAppointmentID)
    {
        $attributes = request()->validate(['note' => 'nullable|string']);
        $attributes['driving_test_appointment_id'] = $testAppointmentID;
        $attributes['created_by'] = auth()->user()->id;

        return $this->drivingTestRepository->create($attributes);
    }

    public function updateTestResult(Request $request, string $id)
    {
        $drivingTest = $this->drivingTestRepository->findById($id);

        if (!$drivingTest) {
            return ['error' => "Driving Test with ID {$id} NotFound...!"];
        }

        $attribute = $request->validate([
            'result' => ['required', Rule::in(['pass', 'fail'])]
        ]);

        $this->drivingTestRepository->update($attribute, $drivingTest);

        // Load the relationship and return the model instance
        return $drivingTest->load('user:id,username');
    }

    public function findById(string $id)
    {
        return $this->drivingTestRepository->findByID($id);
    }
}
