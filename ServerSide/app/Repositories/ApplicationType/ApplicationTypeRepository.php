<?php

namespace App\Repositories\ApplicationType;

use App\Models\ApplicationType;

class ApplicationTypeRepository implements ApplicationTypeInterface
{
    public function getAll()
    {
        return ApplicationType::all();
    }

    public function update(array $attributes, ApplicationType $applicationType)
    {
        return $applicationType->update($attributes);
    }

    public function find(string $id)
    {
        return ApplicationType::find($id);
    }
}
