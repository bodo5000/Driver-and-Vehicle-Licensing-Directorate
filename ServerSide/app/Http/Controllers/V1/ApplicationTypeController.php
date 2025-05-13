<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApplicationTypeRecourse;
use App\Services\ApplicationType\ApplicationTypeContract;
use App\Shared\ResponseTrait;
use Illuminate\Http\Request;

class ApplicationTypeController extends Controller
{
    use ResponseTrait;

    public function __construct(protected ApplicationTypeContract $applicationTypeService)
    {
    }

    public function index()
    {
        $applicationTypes = $this->applicationTypeService->all();

        return !$applicationTypes ? $this->apiResponse(null, 'No ApplicationTypes Yet...!', 200)
            : $this->apiResponse(ApplicationTypeRecourse::collection($applicationTypes), 'success', 200);
    }

    public function update(string $id)
    {
        $applicationType = $this->applicationTypeService->updateFees($id);

        return !$applicationType ? $this->apiResponse(['error' => "No ApplicationType With ID: $id"], 'Fail', 404)
            : $this->apiResponse(new ApplicationTypeRecourse($applicationType), 'Success', 202);
    }
}
