<?php

namespace Passionatelaraveldev\CreatifyLaravel\Concerns;

trait HasAuth
{
    /**
     * API ID
     */
    private string $X_API_ID;

    /**
     * API Key
     */
    private string $X_API_KEY;

    /**
     * return auth header
     */
    public function authHeader(): array
    {
        return [
            'X-API-ID' => $this->X_API_ID,
            'X-API-KEY' => $this->X_API_KEY,
        ];
    }

    /**
     * make sure if auth is provided or not
     */
    public function ensureAuth(): bool
    {
        if (empty($this->X_API_ID) || empty($this->X_API_KEY)) {
            return false;
        }

        return true;
    }
}
