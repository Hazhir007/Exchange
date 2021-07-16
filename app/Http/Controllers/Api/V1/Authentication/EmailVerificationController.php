<?php


namespace App\Http\Controllers\Api\V1\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\EmailVerificationRequest;
use App\Services\Authentication\EmailVerificationService;
use Illuminate\Http\JsonResponse;


class EmailVerificationController extends Controller
{
    /**
     * @throws \Exception
     */
    public function __invoke(EmailVerificationService $emailVerificationService,
                             EmailVerificationRequest $emailVerificationRequest): JsonResponse
    {
        $validatedRequest = $emailVerificationRequest->validated();
        $status = $emailVerificationService->verifyEmail($validatedRequest);
        if ($status) {
            return $this->JsonResponseSuccess('email has been verified');
        }
        return $this->JsonResponseError('please check the code or email and try again', 400);
    }
}
