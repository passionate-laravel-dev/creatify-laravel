<?php

namespace Passionatelaraveldev\CreatifyLaravel\Api;

use Illuminate\Http\JsonResponse;
use Passionatelaraveldev\CreatifyLaravel\Concerns\HasOptionalParams;
use Passionatelaraveldev\CreatifyLaravel\Enum\AspectRatio;
use Passionatelaraveldev\CreatifyLaravel\Enum\CaptionStyle;

class Lipsyncs
{
    use HasOptionalParams;

    public function __construct(protected BaseApiClient $client) {}

    /**
     * API that converts text or audio files to vivid videos of a single people speaking.
     *
     * @see http://docs.creatify.ai/api-reference/lipsyncs/post-apilipsyncs#body-background-asset-image-url
     */
    public function createLipsyncTask(
        AspectRatio $aspect_ratio,
        ?string $name,
        ?string $text,
        ?string $audio,
        ?string $creator,
        ?bool $green_screen,
        ?string $webhook_url,
        ?string $accent,
        ?bool $no_caption,
        ?bool $no_music,
        CaptionStyle $caption_style,
        ?string $caption_offset_x,
        ?string $caption_offset_y,
        string $background_asset_image_url
    ): JsonResponse {
        $params = $this->getFuncArgs(__FUNCTION__, func_get_args());
        $params['aspect_ratio'] = $aspect_ratio->value;
        $params['caption_style'] = $caption_style->value;

        $res = $this->client->request('post', 'api/lipsyncs', $params);

        return $this->client->jsonStatusResponse($res);
    }

    /**
     * Get lipsync items
     *
     * @see https://docs.creatify.ai/api-reference/lipsyncs/get-apilipsyncs
     */
    public function getLipsyncItems(?string $ids = null): JsonResponse
    {
        $res = $this->client->getRequest('api/lipsyncs', $ids);

        return $this->client->jsonStatusResponse($res);
    }

    /**
     * Get lipsync item by id
     *
     * @see https://docs.creatify.ai/api-reference/lipsyncs/get-apilipsyncs-
     */
    public function getLipsyncById(string $id): JsonResponse
    {
        $res = $this->client->getRequest("api/lipsyncs/$id");

        return $this->client->jsonStatusResponse($res);
    }

    /**
     * Generate Preview of Lipsync
     *
     * @see https://docs.creatify.ai/api-reference/lipsyncs/post-apilipsyncs-preview
     */
    public function generatePreviewOfLipsync(
        AspectRatio $aspect_ratio,
        ?string $name,
        ?string $text,
        ?string $audio,
        ?string $creator,
        ?bool $green_screen,
        ?string $webhook_url,
        ?string $accent,
        ?bool $no_caption,
        ?bool $no_music,
        CaptionStyle $caption_style,
        ?string $caption_offset_x,
        ?string $caption_offset_y,
        string $background_asset_image_url
    ): JsonResponse {
        $params = $this->getFuncArgs(__FUNCTION__, func_get_args());
        $params['aspect_ratio'] = $aspect_ratio->value;
        $params['caption_style'] = $caption_style->value;

        $res = $this->client->request('post', 'api/lipsyncs/preview', $params);

        return $this->client->jsonStatusResponse($res);
    }

    /**
     * Redner lipsync task
     *
     * @see https://docs.creatify.ai/api-reference/lipsyncs/post-apilipsyncs-render
     */
    public function renderLipsyncTask(string $id): JsonResponse
    {
        $res = $this->client->request('post', "api/lipsyncs/$id");

        return $this->client->jsonStatusResponse($res);
    }
}
