<?php

namespace App\Repositories\DrivingTestAppointment;

interface DrivingTestAppointmentInterface
{
    public function all();
    public function create(array $attributes);
}
