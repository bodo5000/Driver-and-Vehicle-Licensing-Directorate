<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DrivingTest extends Model
{
    protected $guarded = ['_token', '_method'];

    public function drivingTestAppointment(): BelongsTo
    {
        return $this->belongsTo(DrivingTestAppointment::class, 'created_by');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
