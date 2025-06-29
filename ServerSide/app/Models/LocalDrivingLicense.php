<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LocalDrivingLicense extends Model
{

    protected $guarded = ['_method', '_token'];

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function licenseClass(): BelongsTo
    {
        return $this->belongsTo(LicenseClass::class);
    }

    public function drivingTestAppointments(): HasMany
    {
        return $this->hasMany(DrivingTestAppointment::class);
    }

}
