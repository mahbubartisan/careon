<?php

namespace App\Enums;

enum DoctorType: string
{
    case GENERAL_PHYSICIAN = 'General Physician';
    case CARDIOLOGIST      = 'Cardiologist';
    case DERMATOLOGIST     = 'Dermatologist';
    case PEDIATRICIAN      = 'Pediatrician';
    case GYNECOLOGIST      = 'Gynecologist';
    case ORTHOPEDIC        = 'Orthopedic';
    case NEUROLOGIST       = 'Neurologist';
    case PSYCHIATRIST      = 'Psychiatrist';
    case ENT_SPECIALIST    = 'ENT Specialist';
    case UROLOGIST         = 'Urologist';
    case ENDOCRINOLOGIST   = 'Endocrinologist';
    case GASTROENTEROLOGIST= 'Gastroenterologist';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
