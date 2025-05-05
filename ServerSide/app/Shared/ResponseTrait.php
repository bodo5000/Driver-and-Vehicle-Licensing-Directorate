<?php

namespace App\Shared;

trait ResponseTrait
{
    public function apiResponse(object $collection = null, string $message = null, int $status = null)
    {
        $array = [
            'message' => $message,
            'status' => $status,
            'data' => $collection,
        ];

        return response()->json($array, $status);
    }
}
