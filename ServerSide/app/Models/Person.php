<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends Model
{
    protected $guarded = ['_method', '_token'];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
}
