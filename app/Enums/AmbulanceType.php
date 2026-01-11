<?php

namespace App\Enums;

enum AmbulanceType: string
{
    case ICU      = 'ICU';
    case NICU     = 'NICU';
    case AC       = 'AC';
    case AIR      = 'Air Ambulance';
    case FREEZER  = 'Freezer Van';
    case NON_AC   = 'Non-AC';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
