<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateTimeUtil
{
    public static function toDateTimeString(mixed $date): string
    {
        return Carbon::createFromDate($date)->toDateTimeString();
    }

    public static function format(mixed $date, string $format = 'Y-m-d'): string
    {
        return Carbon::createFromDate($date)->format($format);
    }
}
