<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestType extends Model
{
    protected $fillable = ['title', 'fees'];

    public function drivingTestAppointments(): HasMany
    {
        return $this->hasMany(DrivingTestAppointment::class);
    }
}
