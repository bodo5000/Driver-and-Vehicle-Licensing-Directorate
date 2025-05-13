<?php

namespace App\Services\ApplicationType;

use App\Repositories\ApplicationType\ApplicationTypeInterface;

class ApplicationTypeService implements ApplicationTypeContract
{
    public function __construct(protected ApplicationTypeInterface $applicationTypeRepository)
    {
    }

    public function all()
    {
        return $this->applicationTypeRepository->getAll();
    }

    public function updateFees(string $id)
    {
        $applicationType = $this->applicationTypeRepository->find($id);

        if (!$applicationType)
            return false;

        $feesAttribute = request()->validate(['fees' => 'required|decimal:1']);
        $updated = $this->applicationTypeRepository->update($feesAttribute, $applicationType);
        return $updated ? $applicationType : null;
    }
}
