<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class WelcomeController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return $this->JsonResponseSuccess("Welcome to API version 2");
    }
}
