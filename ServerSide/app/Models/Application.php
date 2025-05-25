<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    protected $guarded = ['_token', '_method'];

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }

    public function applicationType(): BelongsTo
    {
        return $this->belongsTo(ApplicationType::class);
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
