<?php

namespace App\Http\Controllers\Api\V1\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\EmailVerificationResendRequest;
use App\Services\Authentication\EmailVerificationResendService;
use Illuminate\Http\JsonResponse;

class EmailVerificationResendController extends Controller
{
    public function __construct(
        private EmailVerificationResendService $service,
        private EmailVerificationResendRequest $request)
    {

    }

    public function __invoke(): JsonResponse
    {
        $validatedRequest = $this->request->validated();
        if ($this->service->resendEmail($validatedRequest)) {
            return $this->JsonResponseSuccess('new email has been sent');
        }
        return $this->JsonResponseError('email has been already verified or email is not registered', 400);
    }
}
