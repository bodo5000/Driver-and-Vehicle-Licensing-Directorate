<?php

namespace App\Repositories\ApplicationType;

use App\Models\ApplicationType;

interface ApplicationTypeInterface
{
    public function getAll();
    public function update(array $attributes, ApplicationType $applicationType);
    public function find(string $id);
}
