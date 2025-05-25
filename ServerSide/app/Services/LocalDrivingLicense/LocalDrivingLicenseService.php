<?php

namespace App\Services\LocalDrivingLicense;

use App\Models\LicenseClass;
use App\Repositories\LocalDrivingLicense\LocalDrivingLicenseInterface;
use App\Services\Application\ApplicationContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocalDrivingLicenseService implements LocalDrivingLicenseContract
{

    public function __construct(protected LocalDrivingLicenseInterface $localDrivingLicenseRepository, protected ApplicationContract $applicationService)
    {
    }


    public function all()
    {
        return $this->localDrivingLicenseRepository->getAll();
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $application = $this->applicationService->store($request, 2);
            $attributes = $request->validate(['license_class_id' => 'required']);
            $licenseClass = LicenseClass::find($attributes['license_class_id']);

            if (!$licenseClass) {
                DB::rollBack();

                return ['fail' => "License Class with ID: {$attributes['license_class_id']} not found"];
            }

            $person_age = \Carbon\Carbon::parse($application->person->date_of_birth)->age;

            if ($person_age < $licenseClass->min_allowed_age) {
                DB::rollBack();

                return ['fail' => "your age is not allowed for this type of applications"];
            }

            $attributes['application_id'] = $application->id;

            $localDrivingLicense = $this->localDrivingLicenseRepository->create($attributes);
            DB::commit();

            return $localDrivingLicense;

        } catch (\Throwable $th) {
            DB::rollBack();
            return ['error' => $th->getMessage()];
        }
    }

}
