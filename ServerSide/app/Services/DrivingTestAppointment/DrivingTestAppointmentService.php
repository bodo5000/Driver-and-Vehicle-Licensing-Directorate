<?php

namespace App\Services\DrivingTestAppointment;

use App\Http\Requests\DrivingTestAppointmentRequest;
use App\Repositories\DrivingTestAppointment\DrivingTestAppointmentInterface;
use App\Services\DrivingTest\DrivingTestContract;
use App\Services\LocalDrivingLicense\LocalDrivingLicenseContract;
use App\Services\TestType\TestTypeContract;
use Illuminate\Support\Facades\DB;

class DrivingTestAppointmentService implements DrivingTestAppointmentContract
{
    public function __construct(
        protected DrivingTestAppointmentInterface $drivingTestAppointmentRepository,
        protected TestTypeContract $testTypeService,
        protected LocalDrivingLicenseContract $localDrivingLicenseService,
        protected DrivingTestContract $drivingTestService
    ) {
    }

    public function getAll()
    {
        return $this->drivingTestAppointmentRepository->all();
    }

    private function getPreviousTest($currentTestTypeID, $localDrivingLicenseID)
    {
        return $this->drivingTestService
            ->getDrivingTestByLocalDrivingAndTestType(
                $localDrivingLicenseID,
                $currentTestTypeID - 1,
                'pass'
            );
    }

    private function dealingWithTestAppointmentInOrder($testTypeID, $localDrivingLicenseID)
    {
        if ($testTypeID == 2 || $testTypeID == 3) {
            $perviousTest = $this->getPreviousTest($testTypeID, $localDrivingLicenseID);
            if (!$perviousTest) {
                return false;
            }
        }

        return true;
    }

    public function create(DrivingTestAppointmentRequest $drivingTestAppointmentRequest)
    {

        $drivingTestAppointmentAttributes = $drivingTestAppointmentRequest->validated();
        $testType = $this->testTypeService->findById($drivingTestAppointmentAttributes['test_type_id']);

        if (!$testType) {
            return ['error' => "Test Type With ID {$drivingTestAppointmentAttributes['test_type_id']} Not Found"];
        }

        $localDrivingLicense = $this->localDrivingLicenseService->findById($drivingTestAppointmentAttributes['local_driving_license_id']);
        if (!$localDrivingLicense) {
            return ['error' => "LocalDrivingLicense With ID {$drivingTestAppointmentAttributes['local_driving_license_id']} Not Found"];
        }

        if (!$this->dealingWithTestAppointmentInOrder($testType->id, $localDrivingLicense->id)) {
            return ['error' => "you can't apply this test before passing the previous one"];
        }

        $drivingTestAppointmentAttributes['created_by'] = auth()->user()->id;

        DB::beginTransaction();
        try {
            $drivingTestAppointment = $this->drivingTestAppointmentRepository
                ->create($drivingTestAppointmentAttributes);
            $this->drivingTestService->store($drivingTestAppointment->id);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return ['error' => $th->getMessage()];
        }

        return $drivingTestAppointment->load(['drivingTest', 'user']);
    }
}
