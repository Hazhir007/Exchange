<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $response = [
            'success' => true,
            'message' => "Welcome to API version 2",
        ];

        return response()->json($response, 200);
    }
}
