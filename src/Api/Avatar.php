<?php

namespace Passionatelaraveldev\CreatifyLaravel\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Passionatelaraveldev\CreatifyLaravel\Concerns\HasOptionalParams;
use Passionatelaraveldev\CreatifyLaravel\Enum\Avatar\AgeRange;
use Passionatelaraveldev\CreatifyLaravel\Enum\Avatar\Gender;
use Passionatelaraveldev\CreatifyLaravel\Enum\Avatar\Location;
use Passionatelaraveldev\CreatifyLaravel\Enum\Avatar\Style;

class Avatar  {
    use HasOptionalParams;

    public function __construct(protected BaseApiClient $client) {}

    /**
     * get all avaiblae avatars
     *
     * @param AgeRange|null $age_range
     * @param Gender|null $gender
     * @param Location|null $location
     * @param Style|null $style
     *
     * @return JsonResponse
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
            'gender'    => $gender?->value,
            'location'  => $location?->value,
            'style'     => $style?->value
        ]);

        $res = $this->client->getRequest('api/personas', $params);
        return $this->client->jsonStatusResponse($res);
    }

    /**
     * Get all vaialble avatars with pagination
     * @param int $page
     * @param int $page_size
     *
     * @return JsonResponse
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
     * @param AgeRange|null $age_range
     * @param Gender|null $gender
     * @param Location|null $location
     * @param Style|null $style
     *
     * @return JsonResponse
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
            'gender'    => $gender?->value,
            'location'  => $location?->value,
            'style'     => $style?->value
        ]);

        $res = $this->client->getRequest('api/personas_v2', $params);
        return $this->client->jsonStatusResponse($res);
    }

    /**
     * get avatar by id
     * @param string $id
     * @return JsonResponse
     *
     * @see https://docs.creatify.ai/api-reference/personas/get-apipersonas-
     */
    public function getAvatarById(string $id): JsonResponse {
        $res = $this->client->getRequest("api/personas/$id");
        return $this->client->jsonStatusResponse($res);
    }

    /**
     * create custom avatar
     * @return JsonRespose
     *
     * @see https://docs.creatify.ai/api-reference/personas/post-apipersonas
     */
    public function createCustomAvatar(
        Gender $gender,
        string $creator_name,
        string $consent_video,
        ?string $video_scene = null,
        ?string $keywords = null,
        string $lipsync_input,
        array $labels,
        ?string $webhook_url = null,
        string $gdown_url
    ):JsonResponse {
        $params = $this->getFuncArgs(__FUNCTION__, func_get_args());
        $params['gender'] = $gender->value;

        $res = $this->client->request("post", "api/personas_v2", $params);
        return $this->client->jsonStatusResponse($res);
    }

    /**
     * Get the number of Custom Avatars you can create
     * @return JsonResponse
     *
     * @see https://docs.creatify.ai/api-reference/personas/get-apipersonas-count
     */
    public function getCustomAvatarCreationAvailabilityByNumber():JsonResponse {
        $res = $this->client->getRequest("api/personas_v2/count");
        return $this->client->jsonStatusResponse($res);
    }

    /**
     * delete custom avatar
     * @param string $id
     * @return JsonResponse
     *
     * @see https://docs.creatify.ai/api-reference/personas/delete-apipersonas-
     */
    public function deleteCustomAvatar(string $id): JsonResponse {
        $res = $this->client->request("delete", "api/personas/$id");
        return $this->client->jsonStatusResponse($res);
    }
}
