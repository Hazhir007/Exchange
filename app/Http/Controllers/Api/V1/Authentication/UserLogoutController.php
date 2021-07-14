<?php

namespace App\Http\Controllers\Api\V1\Authentication;

use App\Http\Controllers\Controller;
use App\Services\Authentication\UserLogoutService;
use Illuminate\Http\JsonResponse;

class UserLogoutController extends Controller
{
    public function __invoke(UserLogoutService $service): JsonResponse
    {
        if ($service->Logout())
            return $this->JsonResponseSuccess('token deleted successfully');
        return $this->JsonResponseError('bad request', 400);
    }
}
