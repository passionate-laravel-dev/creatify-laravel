<?php

namespace Passionatelaraveldev\CreatifyLaravel\Api;

use Illuminate\Http\JsonResponse;
use Passionatelaraveldev\CreatifyLaravel\Concerns\HasOptionalParams;

class Links  {
    use HasOptionalParams;

    public function __construct(protected BaseApiClient $client) {}

    /**
     * Retrieve a list of videos, with an optional ids param to filter vdieo by their UUIDs.
     *
     * @param string|null $ids
     * @return JsonResponse
     *
     * @see https://docs.creatify.ai/api-reference/links/get-apilinks
     */
    public function getExistingLinks(?string $ids = null): JsonResponse {
        $res = $this->client->getRequest('api/links', $ids);
        return $this->client->jsonStatusResponse($res);
    }

    /**
     * API that creates a link from url. Creating a link through this endpoint costs 1 credit.
     *
     * @param string $url
     * @return JsonResponse
     *
     * @see https://docs.creatify.ai/api-reference/links/post-apilinks
     */
    public function createLink(string $url): JsonResponse {
        $res = $this->client->request("post", 'api/links', [ 'url' => $url ]);
        return $this->client->jsonStatusResponse($res);
    }

    /**
     * API that creates a link from parameters.
     *
     * @param string|null $title
     * @param string|null $description
     * @param array $image_urls
     * @param array $video_urls
     * @param any|null $reviews
     * @param string|null $logo_url
     *
     * @return JsonResponse
     *
     * @see https://docs.creatify.ai/api-reference/links/post-apilink_with_params
     */
    public function createLinkWithParams(
        ?string $title = null,
        ?string $description = null,
        ?array $image_urls = [],
        ?array $video_urls = [],
        $reviews = null,
        ?string $logo_url = null
    ): JsonResponse {
        $res = $this->client->request("post", 'api/links/link_with_params', $this->getFuncArgs( __FUNCTION__, func_get_args()));
        return $this->client->jsonStatusResponse($res);
    }

    /**
     * API that updates a link.
     *
     * @param string $id
     * @param string|null $url
     * @param string|null $title
     * @param string|null $description
     * @param array $image_urls
     * @param array $video_urls
     * @param any|null $reviews
     * @param string|null $logo_url
     * @param string|null $ai_summary
     *
     * @return JsonResponse
     *
     * @see https://docs.creatify.ai/api-reference/links/put-apilinks-
     */
    public function updateLink(
        string $id,
        ?string $url = null,
        ?string $title = null,
        ?string $description = null,
        ?array $image_urls = [],
        ?array $video_urls = [],
        $reviews = null,
        ?string $logo_url = null,
        ?string $ai_summary = null,
    ): JsonResponse {
        $res = $this->client->request("put", "api/links/$id", $this->getFuncArgs( __FUNCTION__, func_get_args()));
        return $this->client->jsonStatusResponse($res);
    }

    /**
     * get link by id
     *
     * @param string $id
     * @return JsonResponse
     *
     * @see https://docs.creatify.ai/api-reference/links/get-apilinks-
     */
    public function getLinkById(string $id): JsonResponse {
        $res = $this->client->getRequest("api/links/$id");
        return $this->client->jsonStatusResponse($res);
    }
}
