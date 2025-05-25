<?php

namespace App\Repositories\Application;

use App\Models\Person;


interface ApplicationInterface
{
    public function getAll();
    public function getLatest();
    public function create(array $attributes);
    public function isUserApplicationExists($applicationTypeID, Person $person, string $status = 'new');
}
