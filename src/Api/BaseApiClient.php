<?php

namespace Passionatelaraveldev\CreatifyLaravel\Api;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Passionatelaraveldev\CreatifyLaravel\Concerns\HasAuth;
use Passionatelaraveldev\CreatifyLaravel\Concerns\HasStatusResponse;
use Passionatelaraveldev\CreatifyLaravel\Contracts\WithAuth;

abstract class BaseApiClient implements WithAuth {
    use HasAuth;
    use HasStatusResponse;

    /**
     * api base url
     * @var string $apiBaseUrl
     */
    private string $apiBaseUrl;

    /**
     * get full api endpoint
     *
     * @param string $url
     * @return string
     */
    public function getFullUrl(string $url): string {
        return $this->apiBaseUrl . $url;
    }

    /**
     * general request
     *
     * @param string $method
     * @param string $url
     * @param array|null $params
     *
     * @return Response
     */
    public function request(string $method, string $url, ?array $params = []): Response {
        return match($method) {
            'get'       => Http::withHeaders($this->getHeaders())->get($this->getFullUrl($url), $params),
            'post'      => Http::withHeaders($this->getHeaders())->post($this->getFullUrl($url), $params),
            'put'       => Http::withHeaders($this->getHeaders())->put($this->getFullUrl($url), $params),
            'delete'    => Http::withHeaders($this->getHeaders())->delete($this->getFullUrl($url), $params),
            default     => Http::withHeaders($this->getHeaders())->get($this->getFullUrl($url), $params)
        };
    }

    /**
     * general get requests
     *
     * @param string $url
     * @param array|string|null $queryParams
     *
     * @return Response
     */
    public function getRequest(string $url, $queryParams = null): Response {
        return Http::withHeaders($this->getHeaders())->get($this->getFullUrl($url), $queryParams);
    }

    /**
     * get headers
     *
     * @param array $headers
     * @return array
     */
    protected function getHeaders(?array $headers = [] ): array {
        $authHeaders = $this->authHeader();
        $defaultHeaders =  [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
        return array_merge($authHeaders, $defaultHeaders, $headers);
    }
}
