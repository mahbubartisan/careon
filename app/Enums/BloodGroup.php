<?php

namespace App\Enums;

enum BloodGroup: string
{
    case O_NEGATIVE = 'O-';
    case O_POSITIVE = 'O+';
    case A_NEGATIVE = 'A-';
    case A_POSITIVE = 'A+';
    case B_NEGATIVE = 'B-';
    case B_POSITIVE = 'B+';
    case AB_NEGATIVE = 'AB-';
    case AB_POSITIVE = 'AB+';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
