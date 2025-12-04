<?php

namespace App\Enums;

enum Religion: string
{
    case ISLAM = 'Islam';
    case HINDU = 'Hindu';
    case CHRISTIAN = 'Christian';
    case BUDDHIST = 'Buddhist';
    case OTHERS = 'Others';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
