<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DrivingTestAppointment extends Model
{
    protected $guarded = ['_method', '_token'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function testType(): BelongsTo
    {
        return $this->belongsTo(TestType::class);
    }

    public function localDrivingLicense(): BelongsTo
    {
        return $this->belongsTo(LocalDrivingLicense::class);
    }

    public function retakeTestApplication(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }

    public function drivingTest(): HasOne
    {
        return $this->hasOne(DrivingTest::class);
    }
}
