<?php

namespace Passionatelaraveldev\CreatifyLaravel\Concerns;

use Illuminate\Support\Arr;

trait HasEnumConvert
{
    use HasLog;

    /**
     * get enum from string
     * @param string $value
     * @return self
     */
    public static function fromString(string $value): self {
        $self = self::tryFrom($value);

        if ($self === null) {
            self::InvalidTypeLog('fromValue', $value);
        }

        return $self;
    }

    /**
     * get Enum from label
     * @param string $label
     * @return self
     */
    public static function fromLabel(string $label):self {
        $match = Arr::first(self::cases(), static fn($enum) => $enum->label() == $label);

        if(!$match) {
            self::InvalidTypeLog('fromLabel', $label);
        }

        return $match;
    }

    /**
     * get labels from enum
     * @return array
     */
    public static function getLabels(): array {
        $labels = Arr::map(self::cases(), static fn($enum) => $enum->label());
        return $labels;
    }

    /**
     * get label from enum
     * @return string
     */
    public function label(): string {
        return $this->value;
    }
}
