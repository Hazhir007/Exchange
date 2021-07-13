<?php

namespace App\Http\Controllers\Api\V1\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\UserRegistrationRequest;
use App\Http\Resources\UserResource;
use App\Services\Authentication\UserRegistrationService;
use Illuminate\Http\JsonResponse;

class UserRegistrationController extends Controller
{
    public function __invoke(UserRegistrationService $service, UserRegistrationRequest $request): JsonResponse
    {
        $validation = $request->validated();
        $user = $service->register($validation);
        return $this->JsonResponseSuccess(
            'you registered successfully',
            201, new UserResource($user->refresh())
        );
    }
}
