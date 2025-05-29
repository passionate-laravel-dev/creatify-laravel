<?php

namespace Passionatelaraveldev\CreatifyLaravel\Api;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Passionatelaraveldev\CreatifyLaravel\Concerns\HasAuth;
use Passionatelaraveldev\CreatifyLaravel\Concerns\HasStatusResponse;
use Passionatelaraveldev\CreatifyLaravel\Contracts\WithAuth;

abstract class BaseApiClient implements WithAuth
{
    use HasAuth;
    use HasStatusResponse;

    /**
     * api base url
     */
    private string $apiBaseUrl;

    /**
     * get full api endpoint
     */
    public function getFullUrl(string $url): string
    {
        return $this->apiBaseUrl.$url;
    }

    /**
     * general get requests
     *
     * @param  array|string|null  $queryParams
     */
    public function getRequest(string $url, $queryParams = null): Response
    {
        return Http::withHeaders($this->getHeaders())->get($this->getFullUrl($url), $queryParams);
    }

    /**
     * general post requests
     */
    public function postRequest(string $url, ?array $params = [])
    {
        return Http::withHeaders($this->getHeaders())->post($this->getFullUrl($url), $params);
    }

    /**
     * general put requests
     */
    public function putRequest(string $url, ?array $params = [])
    {
        return Http::withHeaders($this->getHeaders())->put($this->getFullUrl($url), $params);
    }

    /**
     * get headers
     */
    protected function getHeaders(?array $headers = []): array
    {
        $authHeaders = $this->authHeader();
        $defaultHeaders = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];

        return array_merge($authHeaders, $defaultHeaders, $headers);
    }
}
