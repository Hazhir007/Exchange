<?php

namespace App\Http\Controllers\Api\V1\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\LoginRequest;
use App\Http\Resources\PrivateUserResource;
use App\Http\Resources\UserResource;
use App\Services\Authentication\UserLoginService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\ValidationException;

class UserLoginController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function __invoke(UserLoginService $service, LoginRequest $request): JsonResponse
    {
        $validation = $request->validated();
        $user = $service->login($validation);

        return $this->JsonResponseSuccess(
            'you signed in successfully',
            200, new PrivateUserResource($user)
        );

    }
}
