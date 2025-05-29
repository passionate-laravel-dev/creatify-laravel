<?php

namespace Passionatelaraveldev\CreatifyLaravel;

use Passionatelaraveldev\CreatifyLaravel\Api\AIScripts;
use Passionatelaraveldev\CreatifyLaravel\Api\Avatar;
use Passionatelaraveldev\CreatifyLaravel\Api\BaseApiClient;
use Passionatelaraveldev\CreatifyLaravel\Api\Links;
use Passionatelaraveldev\CreatifyLaravel\Api\LinkToVideos;
use Passionatelaraveldev\CreatifyLaravel\Api\Lipsyncs;
use Passionatelaraveldev\CreatifyLaravel\Api\Musics;
use Passionatelaraveldev\CreatifyLaravel\Api\Voices;
use Passionatelaraveldev\CreatifyLaravel\Api\Workspace;

class CreatifyLaravel
{
    protected BaseApiClient $client;

    public function __construct()
    {
        $this->client = new BaseApiClient(
            config('creatify-laravel.x-api-id'),
            config('creatify-laravel.x-api-key'),
            config('creatify-laravel.base_url')
        );
    }

    public function links(): Links
    {
        return new Links($this->client);
    }

    public function avatar(): Avatar
    {
        return new Avatar($this->client);
    }

    public function aiScripts(): AIScripts
    {
        return new AIScripts($this->client);
    }

    public function linkToVideos(): LinkToVideos
    {
        return new LinkToVideos($this->client);
    }

    public function lipsyncs(): Lipsyncs
    {
        return new Lipsyncs($this->client);
    }

    public function musics(): Musics
    {
        return new Musics($this->client);
    }

    public function voices(): Voices
    {
        return new Voices($this->client);
    }

    public function workspace(): Workspace
    {
        return new Workspace($this->client);
    }
}
