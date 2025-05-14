<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LicenseClass extends Model
{
    protected $table = 'licenses_classes';
    protected $fillable = ['name', 'description', 'min_allowed_age', 'default_validity_length', 'fees'];

    public function localDrivingLicenses(): HasMany
    {
        return $this->hasMany(LocalDrivingLicense::class);
    }
}
