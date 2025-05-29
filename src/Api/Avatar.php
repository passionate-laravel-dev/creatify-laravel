<?php

namespace Passionatelaraveldev\CreatifyLaravel\Api;

use Illuminate\Http\JsonResponse;
use Passionatelaraveldev\CreatifyLaravel\Concerns\HasOptionalParams;
use Passionatelaraveldev\CreatifyLaravel\Enum\Avatar\AgeRange;
use Passionatelaraveldev\CreatifyLaravel\Enum\Avatar\Gender;
use Passionatelaraveldev\CreatifyLaravel\Enum\Avatar\Location;
use Passionatelaraveldev\CreatifyLaravel\Enum\Avatar\Style;

class Avatar
{
    use HasOptionalParams;

    public function __construct(protected BaseApiClient $client) {}

    /**
     * get all avaiblae avatars
     *
     * @see https://docs.creatify.ai/api-reference/personas/get-apipersonas
     */
    public function getAllAvailableAvatars(
        ?AgeRange $age_range = null,
        ?Gender $gender = null,
        ?Location $location = null,
        ?Style $style = null
    ): JsonResponse {
        $params = array_filter([
            'age_range' => $age_range?->value,
            'gender' => $gender?->value,
            'location' => $location?->value,
            'style' => $style?->value,
        ]);

        $res = $this->client->getRequest('api/personas', $params);

        return $this->client->jsonStatusResponse($res);
    }

    /**
     * Get all avaialble avatars with pagination
     *
     * @see https://docs.creatify.ai/api-reference/personas/get-apipersonas-paginated
     */
    public function getAllAvailableAvatarsWithPagination(
        ?int $page = null,
        ?int $page_size = null,
    ): JsonResponse {
        $res = $this->client->getRequest('api/personas/paginated', $this->getFuncArgs(__FUNCTION__, func_get_args()));

        return $this->client->jsonStatusResponse($res);
    }

    /**
     * get all custom avatars
     *
     * @see https://docs.creatify.ai/api-reference/personas/get-apipersonas-v2
     */
    public function getAllCustomAvatars(
        ?AgeRange $age_range = null,
        ?Gender $gender = null,
        ?Location $location = null,
        ?Style $style = null
    ): JsonResponse {
        $params = array_filter([
            'age_range' => $age_range?->value,
            'gender' => $gender?->value,
            'location' => $location?->value,
            'style' => $style?->value,
        ]);

        $res = $this->client->getRequest('api/personas_v2', $params);

        return $this->client->jsonStatusResponse($res);
    }

    /**
     * get avatar by id
     *
     * @see https://docs.creatify.ai/api-reference/personas/get-apipersonas-
     */
    public function getAvatarById(string $id): JsonResponse
    {
        $res = $this->client->getRequest("api/personas/$id");

        return $this->client->jsonStatusResponse($res);
    }

    /**
     * create custom avatar
     *
     * @see https://docs.creatify.ai/api-reference/personas/post-apipersonas
     */
    public function createCustomAvatar(
        Gender $gender,
        string $creator_name,
        string $consent_video,
        ?string $video_scene,
        ?string $keywords,
        string $lipsync_input,
        array $labels,
        ?string $webhook_url,
        string $gdown_url
    ): JsonResponse {
        $params = $this->getFuncArgs(__FUNCTION__, func_get_args());
        $params['gender'] = $gender->value;

        $res = $this->client->request('post', 'api/personas_v2', $params);

        return $this->client->jsonStatusResponse($res);
    }

    /**
     * Get the number of Custom Avatars you can create
     *
     * @see https://docs.creatify.ai/api-reference/personas/get-apipersonas-count
     */
    public function getCustomAvatarCreationAvailabilityByNumber(): JsonResponse
    {
        $res = $this->client->getRequest('api/personas_v2/count');

        return $this->client->jsonStatusResponse($res);
    }

    /**
     * delete custom avatar
     *
     * @see https://docs.creatify.ai/api-reference/personas/delete-apipersonas-
     */
    public function deleteCustomAvatar(string $id): JsonResponse
    {
        $res = $this->client->request('delete', "api/personas/$id");

        return $this->client->jsonStatusResponse($res);
    }
}
