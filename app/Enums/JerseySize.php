<?php

namespace App\Enums;

enum JerseySize: string
{
    case S = 'S/36';
    case M = 'M/38';
    case L = 'L/40';
    case XL = 'XL/42';
    case XXL = 'XXL/44';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
