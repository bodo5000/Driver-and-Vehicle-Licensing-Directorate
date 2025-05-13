<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TestTypeResource;
use App\Services\TestType\TestTypeContract;
use App\Shared\ResponseTrait;
use Illuminate\Http\Request;

class TestTypeController extends Controller
{
    use ResponseTrait;

    public function __construct(protected TestTypeContract $testTypeService)
    {
    }

    public function index()
    {
        $testTypes = $this->testTypeService->all();

        return !$testTypes ? $this->apiResponse(null, 'there is no Test Types Yet...!', 200)
            : $this->apiResponse(TestTypeResource::collection($testTypes), 'success', 200);
    }

    public function update(string $id)
    {
        $TestType = $this->testTypeService->updateFees($id);
        return !$TestType ? $this->apiResponse(['error' => "No TestType With ID: $id"], 'Fail', 404)
            : $this->apiResponse(new TestTypeResource($TestType), 'Success', 202);
    }
}
