<?php

namespace App\Http\Controllers\Api\V1\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\LogoutRequest;
use App\Services\Authentication\UserLogoutService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserLogoutController extends Controller
{
    public function __invoke(UserLogoutService $service, Request $request): JsonResponse
    {
        if ($service->Logout($request)) {
            return $this->JsonResponseSuccess('token deleted successfully');
        }
        return $this->JsonResponseError('bad request', 400);
    }
}
