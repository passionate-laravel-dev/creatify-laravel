<?php

namespace Passionatelaraveldev\CreatifyLaravel\Api;

use Illuminate\Http\JsonResponse;
use Passionatelaraveldev\CreatifyLaravel\Concerns\HasOptionalParams;
use Passionatelaraveldev\CreatifyLaravel\Enum\Voice\Type;

class Voices
{
    use HasOptionalParams;

    public function __construct(protected BaseApiClient $client) {}

    /**
     * get voices
     *
     * @see https://docs.creatify.ai/api-reference/voices/get-apivoices
     */
    public function getVoices(
        Type $type,
        string $input_text,
        ?string $voice_id = null,
        float $volume = 0.8,
    ): JsonResponse {
        $params = $this->getFuncArgs(__FUNCTION__, func_get_args());
        $params['type'] = $type->value;

        $res = $this->client->getRequest('api/voices', $params);

        return $this->client->jsonStatusResponse($res);
    }

    /**
     * Get voices with pagination
     *
     * @see https://docs.creatify.ai/api-reference/voices/get-apivoices-paginated
     */
    public function getVoicesWithPagination(
        int $page = 1,
        int $page_size = 10
    ): JsonResponse {
        $res = $this->client->getRequest('api/voices/paginated', $this->getFuncArgs(__FUNCTION__, func_get_args()));

        return $this->client->jsonStatusResponse($res);
    }
}
