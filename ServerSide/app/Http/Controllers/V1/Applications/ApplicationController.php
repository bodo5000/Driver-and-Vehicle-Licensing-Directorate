<?php

namespace App\Http\Controllers\V1\Applications;

use App\Exceptions\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApplicationResource;
use App\Services\Application\ApplicationContract;
use App\Shared\ResponseTrait;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    use ResponseTrait;

    public function __construct(protected ApplicationContract $applicationService)
    {

    }

    public function index()
    {
        return $this->apiResponse(
            ApplicationResource::collection($this->applicationService->latest()),
            'success',
            200
        );
    }

    public function store(Request $request)
    {
        try {
            $application = $this->applicationService->store($request);

            if (is_array($application)) {
                return $this->apiResponse($application, 'fail', 400);
            }

            return $this->apiResponse(
                new ApplicationResource($application),
                'created',
                201
            );


        } catch (ModelNotFoundException $e) {
            return $this->apiResponse(
                ['error' => $e->getMessage()],
                'fail',
                404
            );
        }
    }
}
