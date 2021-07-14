<?php


namespace App\Http\Controllers\Api\V1\Authentication;

use App\Http\Controllers\Controller;
use App\Services\Authentication\EmailVerificationService;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\JsonResponse;


class EmailVerificationController extends Controller
{
    public function __invoke(EmailVerificationService $emailVerificationService,
                             EmailVerificationRequest $emailVerificationRequest): JsonResponse
    {
        $validation = $emailVerificationRequest->validated();
        $status = $emailVerificationService->verifyEmail($validation['id']);
        if ($status) {
            return $this->JsonResponseSuccess('email has been verified');
        }
        return $this->JsonResponseError('bad request', 400);
    }
}
