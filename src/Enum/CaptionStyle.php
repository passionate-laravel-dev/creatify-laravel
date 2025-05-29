<?php

namespace Passionatelaraveldev\CreatifyLaravel\Enum;

use Passionatelaraveldev\CreatifyLaravel\Concerns\HasEnumConvert;

enum CaptionStyle: string
{
    use HasEnumConvert;

    case NORMAL_BLACK = 'normal-black';
    case NORMAL_WHITE = 'normal-white';
    case NORMAL_RED = 'normal-red';
    case NORMAL_BLUE = 'normal-blue';
    case NEO = 'neo';
    case BRICK = 'brick';
    case FRENZY = 'frenzy';
    case VERANA = 'verana';
    case MUSTARD = 'mustard';
    case GLOW = 'glow';
    case MINT = 'mint';
    case COOLERS = 'coolers';
    case BILO = 'bilo';
    case TOONS = 'toons';
    case DEEP_BLUDE = 'deep-blue';
    case MYSTIQUE = 'mystique';
    case CAUTION = 'caution';
    case DUALITY = 'duality';

    /**
     * get label from enum
     */
    public function label(): string
    {
        return match ($this) {
            self::NORMAL_BLACK => 'Normal Black',
            self::NORMAL_BLUE => 'Normal Blue',
            self::NORMAL_RED => 'Normal Red',
            self::NORMAL_WHITE => 'Normal White',
            self::NEO => 'Neo',
            self::BRICK => 'Brick',
            self::FRENZY => 'Frenzy',
            self::VERANA => 'Verana',
            self::MUSTARD => 'Mustard',
            self::GLOW => 'Glow',
            self::MINT => 'Mint',
            self::COOLERS => 'Coolers',
            self::BILO => 'Bilo',
            self::TOONS => 'Toons',
            self::DEEP_BLUDE => 'Deep Blue',
            self::MYSTIQUE => 'Mystique',
            self::CAUTION => 'Caution',
            self::DUALITY => 'Duality'
        };
    }
}
