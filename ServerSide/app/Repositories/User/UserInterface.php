<?php

namespace App\Repositories\User;

use App\Http\Requests\PersonRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;

interface UserInterface
{
    public function getAllUsers();
    public function create(array $data);
    public function findById(string $id);
    public function findByPersonID(string $personID);
    public function deleteUser(User $user);
}
