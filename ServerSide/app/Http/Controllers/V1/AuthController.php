<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Services\Auth\AuthContract;
use App\Shared\ResponseTrait;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ResponseTrait;
    public function __construct(protected AuthContract $authService)
    {
    }

    public function create(AuthRequest $request)
    {
        if (!$token = $this->authService->login($request)) {
            return $this->apiResponse(
                ['loginInfo' => 'invalid Credentials'],
                'fail',
                400
            );
        }

        return $this->authService->createNewToken($token);
    }

    public function destroy()
    {
        $this->authService->logout();
        return $this->apiResponse(['success' => true], 'user signedOut Successfully', 202);
    }
}
