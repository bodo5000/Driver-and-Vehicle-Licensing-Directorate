<?php

namespace App\Services\TestType;

interface TestTypeContract
{
    public function all();
    public function updateFees(string $id);
    public function findById(string $id);
}
