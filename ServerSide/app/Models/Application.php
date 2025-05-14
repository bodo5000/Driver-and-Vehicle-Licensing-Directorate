<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }

    public function applicationType(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function localDrivingLicense()
    {
        return $this->belongsTo(LocalDrivingLicense::class);
    }
}
