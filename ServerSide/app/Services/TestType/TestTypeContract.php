<?php

namespace App\Services\TestType;

interface TestTypeContract
{
    public function all();
    public function updateFees(string $id);
}
