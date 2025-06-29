<?php

namespace App\Providers;

use App\Repositories\DrivingTestAppointment\DrivingTestAppointmentInterface;
use App\Repositories\DrivingTestAppointment\DrivingTestAppointmentRepository;
use App\Services\DrivingTestAppointment\DrivingTestAppointmentContract;
use App\Services\DrivingTestAppointment\DrivingTestAppointmentService;
use Illuminate\Support\ServiceProvider;

class DrivingTestAppointmentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(DrivingTestAppointmentInterface::class, DrivingTestAppointmentRepository::class);
        $this->app->bind(DrivingTestAppointmentContract::class, DrivingTestAppointmentService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
