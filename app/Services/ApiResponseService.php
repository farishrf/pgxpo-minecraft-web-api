<?php

namespace App\Services;

class ApiResponseService
{
    public function error($code, $message, $status)
    {
        return response()->json(['error' => [
            'code' => $code,
            'message' => $message,
            'status' => $status
        ]], $code);
    }
}
