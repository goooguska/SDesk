<?php

namespace App\Enums;

enum StatusRequestEnum: int
{
    case IN_WORK = 1;

    case NEW = 2;

    case COMPLETE = 3;

    case REJECT = 4;

    public static function values(): array
    {
        return array_map(fn($enum) => $enum->value, self::cases());
    }
}
