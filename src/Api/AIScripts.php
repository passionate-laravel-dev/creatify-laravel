<?php

namespace Passionatelaraveldev\CreatifyLaravel\Api;

use Illuminate\Http\JsonResponse;
use Passionatelaraveldev\CreatifyLaravel\Concerns\HasOptionalParams;

class AIScripts  {
    use HasOptionalParams;

    public function __construct(protected BaseApiClient $client) {}

    /**
     * API that generates AI-driven scripts based on either a URL or a combination of title and description.
     *
     * @param string $url
     * @param string $title
     * @param string $description
     * @param string $language
     * @param string|null $target_audience
     * @param int|null $video_length
     * @param string|null $script_styles
     *
     * @return JsonResponse
     *
     * @see https://docs.creatify.ai/api-reference/ai-scripts/post-ai-scripts
     */
    public function generateAIScripts(
        string $url,
        string $title,
        string $description,
        string $language,
        ?string $target_audience = null,
        ?int $video_length = null,
        ?string $script_styles = null
    ):JsonResponse {
        $res = $this->client->postRequest("api/ai_scripts", $this->getFuncArgs(__FUNCTION__, func_get_args()));
        return $this->client->jsonStatusResponse($res);
    }

    /**
     * Retrieve a list of videos
     *
     * @param string|null $ids
     * @param string|null $ordering
     *
     * @return JsonResponse
     *
     * @see https://docs.creatify.ai/api-reference/ai-scripts/get-ai-scripts
     */
    public function getAIScriptsItems(
        ?string $ids = null,
        ?string $ordering = null
    ): JsonResponse {
        $res = $this->client->getRequest("api/ai_scripts", $this->getFuncArgs(__FUNCTION__, func_get_args()));
        return $this->client->jsonStatusResponse($res);
    }

    /**
     * Get AI Script item by id
     * @param string $id
     * @return JsonResponse
     *
     * @see https://docs.creatify.ai/api-reference/ai-scripts/get-ai-scripts-
     */
    public function getAIScriptItemById(
        string $id
    ) {
        $res = $this->client->getRequest("api/ai_scripts/$id");
        return $this->client->jsonStatusResponse($res);
    }
}
