<?php

namespace App\Http\Controllers\Api\V1\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\ForgotPasswordRequest;
use App\Services\Authentication\UserForgotPasswordService;
use Illuminate\Http\JsonResponse;

class UserForgotPasswordController extends Controller
{
    public function __invoke(UserForgotPasswordService $service,
                             ForgotPasswordRequest $request): JsonResponse
    {
        $validatedRequest = $request->validated();

        if ($service->sendResetPasswordEmail($validatedRequest)) {
            return $this->JsonResponseSuccess('reset password mail has been sent successfully');
        }
        return $this->JsonResponseError('please provide the right token');
    }
}
