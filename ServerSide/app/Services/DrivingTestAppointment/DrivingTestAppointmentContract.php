<?php

namespace App\Services\DrivingTestAppointment;

use App\Http\Requests\DrivingTestAppointmentRequest;

interface DrivingTestAppointmentContract
{
    public function getAll();
    public function create(DrivingTestAppointmentRequest $drivingTestAppointmentRequest);
}
