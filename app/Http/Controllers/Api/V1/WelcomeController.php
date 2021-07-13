<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class WelcomeController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $response = [
            'success' => true,
            'message' => "Welcome to API version 1",
        ];

        return response()->json($response, 200);
    }
}
