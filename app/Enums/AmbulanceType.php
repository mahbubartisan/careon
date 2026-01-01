<?php

namespace App\Enums;

enum AmbulanceType: string
{
    case ICU      = 'ICU';
    case NICU     = 'NICU';
    case AC       = 'AC';
    case AIR      = 'Air';
    case FREEZER  = 'Freezer';
    case NON_AC   = 'None-AC';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
