<?php

namespace App\Traits;

use Exception;

trait ApiResponseTrait
{
    protected function successResponse($data, string $message = 'Success', int $code = 200) {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function errorResponse(Exception $exception, string $message = 'Error', int $code = 500) {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'erorrs' => $exception->getMessage()
        ], $code);
    }
}