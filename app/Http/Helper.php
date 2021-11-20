<?php

if (!function_exists('api_response')) {
    function api_response($success, $message = null, $data = null, $code = 200)
    {
        return response()->json([
            'status' => $success == 1 ? 'success' : 'failed',
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
