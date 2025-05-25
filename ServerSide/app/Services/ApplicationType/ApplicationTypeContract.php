<?php

namespace App\Services\ApplicationType;

interface ApplicationTypeContract
{
    public function all();
    public function updateFees(string $id);
    public function findById(string $id);
}
