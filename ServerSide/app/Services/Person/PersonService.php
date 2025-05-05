<?php

namespace App\Services\Person;

use App\Http\Requests\PersonRequest;
use App\Repositories\Person\PersonInterface;
use App\Shared\ImageHandler;
use Exception;
use Illuminate\Http\Request;

class PersonService implements PersonContract
{
    public function __construct(protected PersonInterface $personRepository)
    {
    }

    public function getPeople()
    {
        return $this->personRepository->getAllLatest();
    }

    public function getPeopleWithFilter(Request $request)
    {
        return $this->personRepository->filter($request);
    }

    public function create(PersonRequest $request)
    {
        $attributes = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = ImageHandler::saveImage($request, 'image', 'person_imageInfo', ['disk' => 'public']);
            $attributes['image'] = $imagePath;
        }

        return $this->personRepository->create($attributes);
    }

    public function getById(string $id)
    {
        return $this->personRepository->getById($id);
    }

    public function getByNationalNo(string $national_no)
    {
        return $this->personRepository->getByNationalNo($national_no);
    }

    public function update(PersonRequest $request, string $id)
    {
        $person = $this->personRepository->getById($id);

        if (!$person) {
            return null;
        }

        $attributes = $request->validated();

        try {
            if ($request->hasFile('image')) {
                $imagePath = ImageHandler::saveImage($request, 'image', 'person_imageInfo', ['disk' => 'public']);
                $attributes['image'] = $imagePath;
            }

            if ($person->image && isset($attributes['image']) && ImageHandler::isImageExistsInStorage('public', $person->image)) {
                ImageHandler::deleteImage($person->image, 'public');
            }
        } catch (\ErrorException $e) {
            throw new Exception('Failed to process the image');
        }

        $updated = $this->personRepository->update($attributes, $person);
        return $updated ? $person : null;
    }

    public function destroy(string $id)
    {
        $person = $this->personRepository->getById($id);

        if ($person) {
            $this->personRepository->destroy($person);

            if (ImageHandler::isImageExistsInStorage('public', $person->image)) {
                ImageHandler::deleteImage($person->image, 'public');
            }
            return true;
        }

        return false;
    }
}
