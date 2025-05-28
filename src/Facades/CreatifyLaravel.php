<?php

namespace Passionatelaraveldev\CreatifyLaravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Passionatelaraveldev\CreatifyLaravel\CreatifyLaravel
 */
class CreatifyLaravel extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Passionatelaraveldev\CreatifyLaravel\CreatifyLaravel::class;
    }
}
