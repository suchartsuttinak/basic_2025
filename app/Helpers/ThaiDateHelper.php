<?php

namespace App\Helpers;

use Carbon\Carbon;
Carbon::setLocale('th');

class ThaiDateHelper
{
    public static function formatThaiDate($date, $full = false)
    {
        Carbon::setLocale('th');
        $carbonDate = Carbon::parse($date);

        $day = $carbonDate->translatedFormat('j');
        $month = $carbonDate->translatedFormat('F');
        $year = $carbonDate->year + 543;

        if ($full) {
            $weekday = $carbonDate->translatedFormat('l');
            return "วัน{$weekday}ที่ {$day} {$month} พ.ศ. {$year}";
        }

        return "{$day} {$month} {$year}";
    }

    public static function formatThaiShort($date)
    {
        $carbonDate = Carbon::parse($date);
        return $carbonDate->format('d/m') . '/' . ($carbonDate->year + 543);
    }
}