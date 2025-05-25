<?php

namespace App\Services\Application;

use App\Exceptions\ModelNotFoundException;
use App\Repositories\Application\ApplicationInterface;
use App\Services\ApplicationType\ApplicationTypeContract;
use App\Services\Person\PersonContract;
use Illuminate\Http\Request;

class ApplicationService implements ApplicationContract
{
    public function __construct(protected ApplicationInterface $applicationRepository, protected PersonContract $personService, protected ApplicationTypeContract $applicationTypeService)
    {

    }

    public function all()
    {
        return $this->applicationRepository->getAll();
    }

    public function latest()
    {
        return $this->applicationRepository->getLatest();
    }

    public function store(Request $request, int $applicationTypeID = null)
    {
        if ($applicationTypeID) {
            $attributes = $request->validate(['person_id' => 'required']);
            $attributes['application_type_id'] = $applicationTypeID;
        } else {
            $attributes = $request->validate([
                'person_id' => 'required',
                'application_type_id' => 'required',
            ]);

            if ($attributes['application_type_id'] == 2 || $attributes['application_type_id'] == 1) {
                return ['error' => "you can't create this type of application from here"];
            }
        }

        if (!$this->applicationTypeService->findById($attributes['application_type_id'])) {
            throw new ModelNotFoundException("Application with ID {$attributes['application_type_id']} not found");
        }

        $person = $this->personService->getById($attributes['person_id']);

        if (!$person) {
            throw new ModelNotFoundException("person with ID {$attributes['person_id']} not found");
        }

        if ($this->applicationRepository->isUserApplicationExists($attributes['application_type_id'], $person)) {
            return ['error' => 'application already exists and not Canceled or Completed'];
        }

        $attributes['created_by'] = auth()->user()->id;
        $attributes['paid_feed'] = 15.0;

        $application = $this->applicationRepository->create($attributes);

        return $application->load('person', 'user', 'applicationType');
    }
}
