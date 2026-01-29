<?php

use Illuminate\Http\JsonResponse;

if (! function_exists('success_response')) {
    /**
     * Return a success JSON response.
     */
    function success_response($data = [], $message = 'Success', $status = 200): JsonResponse
    {
        try {
            return response()->json([
                'status'  => 1,
                'message' => $message,
                'data'    => $data,
            ], $status);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 0,
                'message' => 'Failed to generate success response.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}

if (! function_exists('error_response')) {
    /**
     * Return an error JSON response.
     */
    function error_response($message = 'Something went wrong', $error = null, $status = 500): JsonResponse
    {
        try {
            return response()->json([
                'status'  => 0,
                'message' => $message,
                'error'   => $error,
            ], $status);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 0,
                'message' => 'Failed to generate error response.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
