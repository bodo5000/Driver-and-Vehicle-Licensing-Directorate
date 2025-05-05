<?php

namespace App\Services\Auth;

use App\Http\Requests\AuthRequest;

class AuthService implements AuthContract
{
    public function login(AuthRequest $request)
    {
        if (!$token = auth('api')->attempt($request->validated())) {
            return false;
        }

        return $token;
    }

    public function logout()
    {
        auth()->logout();
    }

    public function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
