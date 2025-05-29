<?php

namespace Passionatelaraveldev\CreatifyLaravel\Enum\Avatar;

use Passionatelaraveldev\CreatifyLaravel\Concerns\HasEnumConvert;

enum Style: string
{
    use HasEnumConvert;

    case SELFIE     = 'selfie';
    case PRESENTER  = 'presenter';
    case OTHER      = 'other';

    /**
     * get label from enum
     * @return string
     */
    public function label():string {
        return match($this) {
            self::SELFIE    => 'Selfie',
            self::PRESENTER => 'Presenter',
            self::OTHER     => 'Other'
        };
    }
}
