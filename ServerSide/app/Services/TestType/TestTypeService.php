<?php

namespace App\Services\TestType;

use App\Repositories\TestType\TestTypeInterface;

class TestTypeService implements TestTypeContract
{
    public function __construct(protected TestTypeInterface $testTypeRepository)
    {
    }

    public function all()
    {
        return $this->testTypeRepository->all();
    }

    public function updateFees(string $id)
    {
        $testType = $this->testTypeRepository->find($id);

        if (!$testType)
            return false;

        $feesAttribute = request()->validate(['fees' => 'required|decimal:1']);
        $updated = $this->testTypeRepository->update($feesAttribute, $testType);
        return $updated ? $testType : null;
    }

}
