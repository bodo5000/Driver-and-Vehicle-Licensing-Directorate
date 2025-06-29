<?php

namespace App\Repositories\DrivingTestAppointment;

use App\Models\DrivingTestAppointment;

class DrivingTestAppointmentRepository implements DrivingTestAppointmentInterface
{
    public function all()
    {
        return DrivingTestAppointment::all();
    }

    public function create(array $attributes)
    {
        return DrivingTestAppointment::create($attributes);
    }
}
