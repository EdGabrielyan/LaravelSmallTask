<?php

namespace App\Enum;

enum TimeEnum: string
{
    public static function format(string $key): string
    {
        return match ($key) {
            self::YEAR->value =>'Y',
            self::MONTH->value => 'm',
            default => 'd'
        };
    }
    CASE YEAR = 'year';
    CASE MONTH = 'month';
    CASE DAY = 'day';
}
