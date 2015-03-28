<?php
namespace IrPUG\FaCal\Lib;

use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: haghighi
 * Date: 3/25/15
 * Time: 5:15 PM

 */
class PersianCarbon extends Carbon
{
    use JalaliCal;

    public static function createPersian(
        $jYear,
        $jMonth,
        $jDay,
        $hour = null,
        $minute = null,
        $second = null,
        $tz = null
    ) {

        list($year, $month, $day) = static::jalaliToGregorian($jYear, $jMonth, $jDay);
        if ($hour === null) {
            $hour = date('G');
            $minute = ($minute === null) ? date('i') : $minute;
            $second = ($second === null) ? date('s') : $second;
        } else {
            $minute = ($minute === null) ? 0 : $minute;
            $second = ($second === null) ? 0 : $second;
        }

        return static::create(
            $year,
            $month,
            $day,
            $hour,
            $minute,
            $second,
            $tz
        );
    }

    public static function createFromPersianDate($jYear, $jMonth, $jDay, $tz = null)
    {
        list($year, $month, $day) = static::jalaliToGregorian($jYear, $jMonth, $jDay);

        return static::createFromDate($year, $month, $day, $tz);
    }
}
