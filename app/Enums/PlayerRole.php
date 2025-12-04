<?php

namespace App\Enums;

enum PlayerRole: string
{
    case BATSMAN = 'Batsman';
    case BOWLER = 'Bowler';
    case ALL_ROUNDER = 'All Rounder';
    case WICKET_KEEPER = 'Wicket Keeper';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
