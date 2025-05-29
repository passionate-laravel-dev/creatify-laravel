<?php

namespace Passionatelaraveldev\CreatifyLaravel\Api;

use Illuminate\Http\JsonResponse;
use Passionatelaraveldev\CreatifyLaravel\Concerns\HasOptionalParams;

class LinkToVideos
{
    use HasOptionalParams;

    public function __construct(protected BaseApiClient $client) {}

    /**
     * APIs that convert any link to a short form video ad
     *
     * @see https://docs.creatify.ai/api-reference/link_to_videos/post-apilink_to_videos
     */
    public function createVideoFromLink(
        string $link,
        ?string $name,
        string $target_platform,
        ?string $target_audience = null,
        ?string $language = null,
        ?int $video_length = null,
        ?string $aspect_ratio = null,
        ?string $script_style = null,
        ?string $visual_style = null,
        ?string $override_avatar = null,
        ?string $override_voice = null,
        ?string $override_script = null,
        ?string $background_music_url = null,
        ?int $background_music_volume = null,
        ?int $voiceover_volume = null,
        ?string $webhook_url = null,
        ?bool $no_background_music = false,
        ?bool $no_caption = false,
        ?bool $no_emotion = false,
        ?bool $no_cta = false,
        ?bool $no_stock_broll = false,
        ?string $caption_style = null,
        ?string $caption_offset_x = null,
        ?string $caption_offset_y = null,
        ?array $caption_setting = null,
    ): JsonResponse {
        $res = $this->client->request("post", 'api/lint_to_videos', $this->getFuncArgs(__FUNCTION__, func_get_args()));
        return $this->client->jsonStatusResponse($res);
    }

    /**
     * Get video result
     *
     * @see https://docs.creatify.ai/api-reference/link_to_videos/get-apilink_to_videos-
     */
    public function getVideoResult(string $id): JsonResponse
    {
        $res = $this->client->getRequest("api/link_to_videos/$id");

        return $this->client->jsonStatusResponse($res);
    }

    /**
     * Retrieve a list of videos, with an optional ids param to filter vdieo by their UUIDs.
     *
     *
     * @see https://docs.creatify.ai/api-reference/link_to_videos/get-apilink_to_videos
     */
    public function getVideoHistory(string $ids): JsonResponse
    {
        $res = $this->client->getRequest('api/link_to_videos', $ids);

        return $this->client->jsonStatusResponse($res);
    }

    /**
     * This endpoint generates a preiview of video before rendering the final video.
     *
     * @see https://docs.creatify.ai/api-reference/link_to_videos/post-apilink_to_videos_preview
     */
    public function generatePreviewVideoFromLink(
        string $link,
        ?string $name,
        string $target_platform,
        ?string $target_audience = null,
        ?string $language = null,
        ?int $video_length = null,
        ?string $aspect_ratio = null,
        ?string $script_style = null,
        ?string $visual_style = null,
        ?string $override_avatar = null,
        ?string $override_voice = null,
        ?string $override_script = null,
        ?string $background_music_url = null,
        ?int $background_music_volume = null,
        ?int $voiceover_volume = null,
        ?string $webhook_url = null,
        ?bool $no_background_music = false,
        ?bool $no_caption = false,
        ?bool $no_emotion = false,
        ?bool $no_cta = false,
        ?bool $no_stock_broll = false,
        ?string $caption_style = null,
        ?string $caption_offset_x = null,
        ?string $caption_offset_y = null,
        ?array $caption_setting = null,
    ): JsonResponse {
        $res = $this->client->request("post", "api/link_to_videos/preview", $this->getFuncArgs(__FUNCTION__, func_get_args()));
        return $this->client->jsonStatusResponse($res);
    }

    /**
     * This endpoint renders a video with preview genereated.
     *
     * @see https://docs.creatify.ai/api-reference/link_to_videos/post-apilink_to_videos_render
     */
    public function renderVideo(string $id): JsonResponse {
        $res = $this->client->request("post", "api/link_to_videos/$id/render");
        return $this->client->jsonStatusResponse($res);
    }

    /**
     * This endpoint generates a list of preview videos asynchronously before rendering the final video
     *
     * @see https://docs.creatify.ai/api-reference/link_to_videos/post-apilink_to_videos_preview_list_aysnc
     */
    public function generateListOfPreviews(
        string $link,
        string $visual_styles,
        ?string $name,
        string $target_platform,
        ?string $target_audience = null,
        ?string $language = null,
        ?int $video_length = null,
        ?string $aspect_ratio = null,
        ?string $script_style = null,
        ?string $visual_style = null,
        ?string $override_avatar = null,
        ?string $override_voice = null,
        ?string $override_script = null,
        ?string $background_music_url = null,
        ?int $background_music_volume = null,
        ?int $voiceover_volume = null,
        ?string $webhook_url = null,
        ?bool $no_background_music = false,
        ?bool $no_caption = false,
        ?bool $no_emotion = false,
        ?bool $no_cta = false,
        ?bool $no_stock_broll = false,
        ?string $caption_style = null,
        ?string $caption_offset_x = null,
        ?string $caption_offset_y = null,
        ?array $caption_setting = null,
        ?string $aspect_ratios = null
    ): JsonResponse {
        $res = $this->client->request("post", "api/link_to_videos/preview_list_async", $this->getFuncArgs(__FUNCTION__, func_get_args()));
        return $this->client->jsonStatusResponse($res);
    }

    /**
     * This endpoint renders a video from the list of previews generated by Generate a list of Previews Async API.
     *
     *
     *
     * @see https://docs.creatify.ai/api-reference/link_to_videos/post-apilink_to_videos_render_single_preview
     */
    public function renderVideoFromListOfPreviews(
        string $id,
        string $media_job
    ): JsonResponse {
        $res = $this->client->request("post", "api/link_to_videos/$id/render_single_preview", ['media_job' => $media_job ]);
        return $this->client->jsonStatusResponse($res);
    }
}
