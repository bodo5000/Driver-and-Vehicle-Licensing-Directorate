<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ApplicationType extends Model
{
    protected $fillable = ['title', 'fees'];

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
}
