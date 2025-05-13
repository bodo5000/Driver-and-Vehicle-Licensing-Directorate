<?php

namespace App\Repositories\TestType;

use App\Models\TestType;

class TestTypeRepository implements TestTypeInterface
{
    public function all()
    {
        return TestType::all();
    }

    public function find($id)
    {
        return TestType::find($id);
    }

    public function update(array $attributes, TestType $testType)
    {
        return $testType->update($attributes);
    }
}
