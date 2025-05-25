<?php

namespace App\Http\Controllers\V1\Applications;

use App\Exceptions\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\LocalDrivingLicenseResource;
use App\Services\LocalDrivingLicense\LocalDrivingLicenseContract;
use App\Shared\ResponseTrait;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isArray;

class LocalDrivingLicenseController extends Controller
{

    use ResponseTrait;

    public function __construct(protected LocalDrivingLicenseContract $localDrivingLicenseService)
    {
    }

    public function index()
    {
        return $this->apiResponse(
            LocalDrivingLicenseResource::collection($this->localDrivingLicenseService->all()),
            'success',
            200
        );
    }

    public function store(Request $request)
    {
        try {
            $LocalDrivingLicense = $this->localDrivingLicenseService->store($request);

            return isArray($LocalDrivingLicense) ? $this->apiResponse($LocalDrivingLicense, 'fail', 400)
                : $this->apiResponse(new LocalDrivingLicenseResource($LocalDrivingLicense), 'create', 201);

        } catch (ModelNotFoundException $e) {
            return $this->apiResponse(['error' => $e->getMessage()], 'NotFound...!', 404);
        }
    }

}
