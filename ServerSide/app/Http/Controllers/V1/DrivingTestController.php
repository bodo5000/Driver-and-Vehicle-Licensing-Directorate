<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\DrivingTestResource;
use App\Services\DrivingTest\DrivingTestContract;
use App\Shared\ResponseTrait;
use Illuminate\Http\Request;

class DrivingTestController extends Controller
{
    use ResponseTrait;

    public function __construct(protected DrivingTestContract $drivingTestService)
    {
    }

    public function update(Request $request, string $id)
    {
        $updateDrivingTestResult = $this->drivingTestService->updateTestResult($request, $id);

        if (is_array($updateDrivingTestResult)) {
            return $this->apiResponse($updateDrivingTestResult, 'fail', 404);
        }

        return $this->apiResponse(new DrivingTestResource($updateDrivingTestResult), 'updated', 202);
    }
}
