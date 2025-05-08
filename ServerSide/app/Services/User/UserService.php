<?php

namespace App\Services\User;

use App\Exceptions\ModelAlreadyExistsException;
use App\Exceptions\ModelNotFoundException;
use App\Repositories\Person\PersonInterface;
use App\Repositories\User\UserInterface;
use App\Http\Requests\PersonRequest;
use App\Http\Requests\UserRequest;
use App\Shared\ImageHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserService implements UserContract
{
    public function __construct(protected UserInterface $userRepository, protected PersonInterface $personRepository)
    {
    }

    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }

    public function createUser(PersonRequest $personRequest, UserRequest $userRequest)
    {
        DB::beginTransaction();
        try {
            $personAttributes = $personRequest->validated();
            if ($personRequest->hasFile('image')) {
                $imagePath = ImageHandler::saveImage($personRequest, 'image', 'person_imageInfo', ['disk' => 'public']);
                $personAttributes['image'] = $imagePath;
            }
            $person = $this->personRepository->create($personAttributes);

            $userAttributes = $userRequest->validated();
            $userAttributes['person_id'] = $person->id;
            $user = $this->userRepository->create($userAttributes);

            DB::commit();
            return $user->load('person');

        } catch (\Throwable $th) {
            DB::rollBack();
            return ['error-message' => $th->getMessage()];
        }
    }

    public function createUserFromExistingPerson(UserRequest $userRequest, string $nationalID)
    {
        $person = $this->personRepository->getByNationalNo($nationalID);

        if (!$person) {
            throw new ModelNotFoundException("person with national_no [$nationalID] not Found");
        }

        if ($person->user) {
            throw new ModelAlreadyExistsException('User');
        }

        $userAttributes = $userRequest->validated();
        $userAttributes['person_id'] = $person->id;
        $user = $this->userRepository->create($userAttributes);

        return $user->load('person');
    }

    public function deleteUser(string $userID)
    {
        $user = $this->userRepository->findById($userID);
        if (!$user) {
            return false;
        }

        return $this->userRepository->deleteUser($user);
    }

    public function updateUserActivation(Request $request, string $id)
    {
        $user = $this->userRepository->findById($id);
        if (!$user) {
            return false;
        }

        $attribute = $request->validate(['isActive' => 'required|boolean']);
        $user->update($attribute);
        return $user;
    }
}
