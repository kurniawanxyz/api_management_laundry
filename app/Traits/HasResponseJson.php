<?php

namespace App\Traits;

trait HasResponseJson
{
    public function res( $status = 200, string $message = 'Success', $data = null)
    {
        return response()->json([
            'success' => ($status >= 200 && $status < 300),
            'message' => $message,
            'data' => $data
        ], $status);
    }
}
