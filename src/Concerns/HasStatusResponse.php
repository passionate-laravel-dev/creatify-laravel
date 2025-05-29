<?php

namespace Passionatelaraveldev\CreatifyLaravel\Concerns;

use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

trait HasStatusResponse
{
    /**
     * response with status for api response handle
     */
    public function jsonStatusResponse(Response $res): JsonResponse
    {
        if ($res->successful()) {
            return response()->json([
                'status' => 'success',
                'resData' => $res->json(),
            ]);
        } else {
            Log::error('error: ', [$res->body()]);

            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
            ]);
        }
    }
}
