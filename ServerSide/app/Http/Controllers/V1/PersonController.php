<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Http\Resources\PersonResource;
use App\Models\Person;
use App\Services\Person\PersonContract;
use App\Shared\ResponseTrait;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    use ResponseTrait;

    public function __construct(protected PersonContract $personService)
    {
    }

    public function index(Request $request)
    {
        $people = $this->personService->getPeopleWithFilter($request);

        if ($people->isEmpty()) {
            return $this->apiResponse(null, 'No Users found..!', 404);
        }

        return $this->apiResponse(PersonResource::collection($people), 'Success', 200);
    }

    public function store(PersonRequest $request)
    {
        return $this->apiResponse(new PersonResource($this->personService->create($request)), 'Created', 201);
    }

    public function show(string $id)
    {
        $person = $this->personService->getById($id);

        if (!$person) {
            return $this->apiResponse(null, 'NotFound...!', 404);
        }

        return $this->apiResponse(new PersonResource($person), 'Success', 200);
    }

    public function showByNationalNo(string $nationalNo)
    {
        $person = $this->personService->getByNationalNo($nationalNo);

        if (!$person) {
            return $this->apiResponse(null, "there is no Person with NationalNo [$nationalNo]...!", 404);
        }
        return $this->apiResponse(new PersonResource($person), 'Success', 200);
    }

    public function update(string $id, PersonRequest $request)
    {
        $updatedPerson = $this->personService->update($request, $id);

        if (!$updatedPerson) {
            return $this->apiResponse(null, "there is no person with id: $id ", 404);
        }

        return $this->apiResponse(new PersonResource($updatedPerson), 'person updated successfully', 202);
    }

    public function destroy(string $id)
    {
        if ($this->personService->destroy($id)) {
            return $this->apiResponse(null, 'person has been deleted', 202);
        }

        return $this->apiResponse(null, "there is no person with id: $id ", 404);
    }
}
