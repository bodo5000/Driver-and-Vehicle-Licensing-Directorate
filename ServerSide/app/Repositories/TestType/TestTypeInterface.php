<?php

namespace App\Repositories\TestType;

use App\Models\TestType;

interface TestTypeInterface
{
    public function all();
    public function find(string $id);

    public function update(array $attributes, TestType $testType);
}
