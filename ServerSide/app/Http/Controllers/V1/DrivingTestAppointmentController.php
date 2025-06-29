<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\DrivingTestAppointmentRequest;
use App\Http\Resources\DrivingTestAppointmentResource;
use App\Services\DrivingTestAppointment\DrivingTestAppointmentContract;
use App\Shared\ResponseTrait;

class DrivingTestAppointmentController extends Controller
{
    use ResponseTrait;

    public function __construct(protected DrivingTestAppointmentContract $drivingTestAppointmentService)
    {
    }

    public function index()
    {
        return $this->apiResponse(
            DrivingTestAppointmentResource::collection(
                $this->drivingTestAppointmentService->getAll()
            ),
            'success',
            200
        );
    }

    public function store(DrivingTestAppointmentRequest $request)
    {
        $DrivingTestAppointment = $this->drivingTestAppointmentService->create($request);

        if (is_array($DrivingTestAppointment)) {
            return $this->apiResponse($DrivingTestAppointment, 'error', 400);
        }

        return $this->apiResponse(new DrivingTestAppointmentResource($DrivingTestAppointment), 'created', 201);
    }
}
