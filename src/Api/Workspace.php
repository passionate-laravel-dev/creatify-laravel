<?php

namespace Passionatelaraveldev\CreatifyLaravel\Api;

use Illuminate\Http\JsonResponse;
use Passionatelaraveldev\CreatifyLaravel\Concerns\HasOptionalParams;

class Workspace
{
    use HasOptionalParams;

    public function __construct(protected BaseApiClient $client) {}

    /**
     * Get Remaining Credits
     *
     * @see https://docs.creatify.ai/api-reference/workspace/get-remainingcredits
     */
    public function getRemainingCredits(): JsonResponse
    {
        $res = $this->client->getRequest('api/remaining_credits');

        return $this->client->jsonStatusResponse($res);
    }
}
