<?php

namespace App\Services\Auth;

use App\Http\Requests\AuthRequest;

interface AuthContract
{
    public function login(AuthRequest $request);
    public function createNewToken($token);

    public function logout();
}
