<?php

namespace Passionatelaraveldev\CreatifyLaravel\Api;

use Illuminate\Http\JsonResponse;
use Passionatelaraveldev\CreatifyLaravel\Concerns\HasOptionalParams;

class Musics
{
    use HasOptionalParams;

    public function __construct(protected BaseApiClient $client) {}

    /**
     * Get music categories
     *
     * @see https://docs.creatify.ai/api-reference/musics/get-api-music-categories
     */
    public function getMusicCategories(): JsonResponse
    {
        $res = $this->client->getRequest('api/music_categories');

        return $this->client->jsonStatusResponse($res);
    }

    /**
     * Get musics
     *
     * @see https://docs.creatify.ai/api-reference/musics/get-api-musics
     */
    public function getMusics(
        ?string $category = null,
        ?int $page = 1,
        ?int $page_size = 10
    ): JsonResponse {
        $res = $this->client->getRequest('api/musics', $this->getFuncArgs(__FUNCTION__, func_get_args()));

        return $this->client->jsonStatusResponse($res);
    }
}
