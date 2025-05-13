<?php

namespace App\Http\Controllers\V1;

use App\Exceptions\ModelAlreadyExistsException;
use App\Exceptions\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Services\User\UserContract;
use App\Shared\ResponseTrait;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ResponseTrait;

    public function __construct(protected UserContract $userService)
    {
    }

    public function index()
    {
        $users = UserResource::collection($this->userService->getAllUsers());

        return $users ? $this->apiResponse(collection: $users, message: 'success', status: 200)
            : $this->apiResponse(collection: null, message: 'No Users Found...!', status: 404);
    }

    public function create(PersonRequest $personRequest, UserRequest $userRequest)
    {
        $user = $this->userService->createUser($personRequest, $userRequest);
        return $user ? $this->apiResponse(new UserResource($user), 'created', 201) : $this->apiResponse($user, 'fail', 400);
    }

    public function createFromExistingPerson(UserRequest $request, string $nationalID)
    {
        try {
            $user = $this->userService->createUserFromExistingPerson($request, $nationalID);
            return $this->apiResponse(new UserResource($user), 'created', 201);

        } catch (ModelAlreadyExistsException $e) {
            return $this->apiResponse(['error' => $e->getMessage()], 'fail', 400);
            
        } catch (ModelNotFoundException $e) {
            return $this->apiResponse(['error' => $e->getMessage()], 'NotFound...', 404);
        }
    }

    public function updateUserActivation(Request $request, string $id)
    {
        $user = $this->userService->updateUserActivation($request, $id);
        return !$user ? $this->apiResponse(null, 'user not found...!', 404)
            : $this->apiResponse(new UserResource($user), 'success', 202);
    }
}
