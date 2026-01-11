<?php

namespace App\Enums;

enum Division: string
{
    case Dhaka = 'Dhaka';
    case Chittagong   = 'Chittagong';
    case Khulna       = 'Khulna';
    case Rajshahi     = 'Rajshahi';
    case Rangpur      = 'Rangpur';
    case Barishal     = 'Barishal';
    case Sylhet       = 'Sylhet';
    case Mymensingh   = 'Mymensingh';
    
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}