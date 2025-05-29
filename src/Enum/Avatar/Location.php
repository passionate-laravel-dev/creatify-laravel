<?php

namespace Passionatelaraveldev\CreatifyLaravel\Enum\Avatar;

use Passionatelaraveldev\CreatifyLaravel\Concerns\HasEnumConvert;

enum Location: string
{
    use HasEnumConvert;

    case OUTDOOR = 'outdoor';
    case FANTASY = 'fantasy';
    case INDOOR = 'indoor';
    case OTHER = 'other';

    /**
     * get label from enum
     */
    public function label(): string
    {
        return match ($this) {
            self::OUTDOOR => 'Outdoor',
            self::FANTASY => 'Fantasy',
            self::INDOOR => 'Indoor',
            self::OTHER => 'Other'
        };
    }
}
