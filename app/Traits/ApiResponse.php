<?php

namespace App\Traits;


use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    /**
     * Return a success JSON response.
     *
     * @param string|null $message
     * @param int|null $code
     * @param null $data
     *
     * @return JsonResponse
     */
    protected function JsonResponseSuccess(?string $message = null, ?int $code = 200, mixed $data = null): JsonResponse
    {
        if ($data === null && $message ==! null) {
            return response()->json([
                'message' => $message,
                'status' => 'success',
            ], $code);
        }

        if ($data !== null && $message === null) {
            return response()->json([
                'status' => 'success',
                'data' => $data
            ], $code);
        }

        if ($data === null && $message === null) {
            return response()->json([
                'status' => 'success'
            ], $code);
        }

        return response()->json([
            'message' => $message,
            'status' => 'success',
            'data' => $data
        ], $code);

    }

    /**
     * Return an error JSON response.
     *
     * @param string|null $message
     * @param int|null $code
     * @param null $data
     * @return JsonResponse
     */
    protected function JsonResponseError(?string $message = null, ?int $code = 200, $data = null): JsonResponse
    {
        if ($data === null && $message ==! null) {
            return response()->json([
                'message' => $message,
                'status' => 'error',
            ], $code);
        }

        if ($data !== null && $message === null) {
            return response()->json([
                'status' => 'error',
                'data' => $data
            ], $code);
        }

        if ($data === null && $message === null) {
            return response()->json([
                'status' => 'error'
            ], $code);
        }

        return response()->json([
            'message' => $message,
            'status' => 'error',
            'data' => $data
        ], $code);


    }
}
