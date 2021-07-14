<?php

namespace App\Http\Controllers\Api\V1\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\ResetPasswordRequest;
use App\Services\Authentication\ResetPasswordService;
use Illuminate\Http\JsonResponse;

class UserResetPasswordController extends Controller
{
    public function __invoke(ResetPasswordService $service, ResetPasswordRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        if ($service->updatePassword($validatedData)) {
            return $this->JsonResponseSuccess('password has been changed successfully', 200);
        }

        return $this->JsonResponseError('Invalid token provided', 401);

    }
}
