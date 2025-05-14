<?php

namespace App\Repositories\Person;

use App\Models\Person;
use App\Shared\RequestFilterTrait;
use Illuminate\Http\Request;


class PersonRepository implements PersonInterface
{
    use RequestFilterTrait;

    public function getAllPeople()
    {
        return Person::all();
    }

    public function getAllLatest()
    {
        return Person::latest()->get();
    }

    public function create(array $attributes)
    {
        return Person::create($attributes);
    }

    public function getById(string $id)
    {
        return person::find($id);
    }

    public function getByNationalNo(string $national_no)
    {
        return Person::where('national_no', $national_no)->first();
    }

    public function update(array $attributes, Person $person)
    {
        return $person->update($attributes);
    }

    public function destroy(Person $person)
    {
        return $person->delete();
    }

    public function filter(Request $request)
    {
        $query = Person::query();

        $this->filterByNationalNo($request, $query);
        $this->filterByGender($request, $query);
        $this->filterByID($request, $query);
        return $query->latest()->paginate(10);
    }
}
