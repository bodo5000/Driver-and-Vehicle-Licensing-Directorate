<?php

namespace App\Repositories\Application;

use App\Models\Application;
use App\Models\Person;


class ApplicationRepository implements ApplicationInterface
{
    public function getAll()
    {
        return Application::all();
    }

    public function getLatest()
    {
        return Application::latest()->get();
    }

    public function create(array $attributes)
    {
        return Application::create($attributes);
    }

    public function isUserApplicationExists($applicationTypeID, Person $person, string $status = 'new')
    {
        return $person->applications()->where('application_type_id', $applicationTypeID)
            ->where('status', $status)->first();
    }
}
