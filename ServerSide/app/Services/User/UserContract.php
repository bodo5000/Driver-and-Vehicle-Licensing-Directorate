<?php

namespace App\Services\User;

use App\Http\Requests\PersonRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

interface UserContract
{
    public function getAllUsers();
    public function createUser(PersonRequest $personRequest, UserRequest $userRequest);
    public function createUserFromExistingPerson(UserRequest $userRequest, string $nationalID);
    public function deleteUser(string $userID);
    public function updateUserActivation(Request $request, string $id);
}
