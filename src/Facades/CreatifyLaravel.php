<?php

namespace Passionatelaraveldev\CreatifyLaravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Passionatelaraveldev\CreatifyLaravel\CreatifyLaravel
 *
 * @method Links links()
 * @method Avatar avatar()
 * @method AIScripts aiScripts()
 * @method LinkToVideos linkToVideos()
 * @method Lipsyncs lipsyncs()
 * @method Musics musics()
 * @method Voices voices()
 * @method Workspace workspace()
 */
class CreatifyLaravel extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Passionatelaraveldev\CreatifyLaravel\CreatifyLaravel::class;
    }
}
