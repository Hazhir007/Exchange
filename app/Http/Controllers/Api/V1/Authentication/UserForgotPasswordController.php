<?php

namespace App\Http\Controllers\Api\V1\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\ForgotPasswordRequest;
use App\Services\Authentication\UserForgotPasswordService;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class UserForgotPasswordController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function __invoke(UserForgotPasswordService $forgotPasswordService,
                             ForgotPasswordRequest $request): JsonResponse
    {
        $validatedRequest = $request->validated();
        $forgotPasswordService->sendResetPasswordEmail($validatedRequest);
        return $this->JsonResponseSuccess('reset password mail has been sent successfully', 200);
    }
}
