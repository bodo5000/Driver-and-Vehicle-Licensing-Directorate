<?php

namespace App\Services\Person;

use App\Http\Requests\PersonRequest;
use Illuminate\Http\Request;

interface PersonContract
{
    public function getPeople();
    public function create(PersonRequest $request);
    public function getById(string $id);
    public function getByNationalNo(string $national_no);
    public function update(PersonRequest $request, string $id);
    public function destroy(string $id);
    public function getPeopleWithFilter(Request $request);
}
