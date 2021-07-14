<?php

namespace App\Http\Controllers\Api\V1\Authentication;

use App\Http\Controllers\Controller;
use App\Services\Authentication\EmailVerificationResendService;
use Illuminate\Http\JsonResponse;

class EmailVerificationResendController extends Controller
{
    public function __construct(private EmailVerificationResendService $emailVerificationResendService)
    {

    }

    public function __invoke(): JsonResponse
    {
        if (! $this->emailVerificationResendService->resendEmail()) {
            return $this->JsonResponseError('email has been already verified', 400);
        }
        return $this->JsonResponseSuccess('new email has been sent');
    }
}
