<?php

namespace App\Enums;

enum DismissalType: string
{
    case Bowled = 'bowled';
    case Caught = 'caught';
    case LBW = 'lbw';
    case RunOut = 'run out';
    case Stumped = 'stumped';
    case HitWicket = 'hit wicket';
    case RetiredHurt = 'retired hurt';
    case NotOut = 'not out';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
