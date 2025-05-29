<?php

namespace Passionatelaraveldev\CreatifyLaravel\Enum\Avatar;

use Passionatelaraveldev\CreatifyLaravel\Concerns\HasEnumConvert;

enum Gender: string
{
    use HasEnumConvert;

    case MALE       = 'm';
    case FEMALE     = 'f';
    case NONBINARY  = 'nb';

    /**
     * get label from enum
     * @return string
     */
    public function label():string {
        return match($this) {
            self::MALE      => 'Male',
            self::FEMALE    => 'Female',
            self::NONBINARY => 'Non Binary'
        };
    }
}
