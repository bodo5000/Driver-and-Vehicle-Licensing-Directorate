<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\Person\PersonInterface;

class UserRepository implements UserInterface
{
    public function __construct(protected PersonInterface $personService)
    {
    }

    public function getAllUsers()
    {
        return User::with('person')->get();
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function findByPersonID(string $personID)
    {
        return User::where('person_id', $personID)->first();
    }

    public function findById(string $id)
    {
        return User::find($id);
    }

    public function deleteUser(User $user)
    {
        return $user->delete();
    }
}
