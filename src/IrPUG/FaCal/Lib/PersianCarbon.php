<?php

/*
 * This file is part of the facal package.
 *
 * (c) IrPUG https://github.com/irpug
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace IrPUG\FaCal\Lib;

use Carbon\Carbon;

/**
 *  An extended Carbon object that helps to create standard Carbon object by Persian date
 *
 * @see https://github.com/briannesbitt/Carbon
 *
 * @author Reza Haghighi <reza.haghighi@gmail.com>
 */
class PersianCarbon extends Carbon
{
    /** Use JalaliCal trait */
    use JalaliCal;

    /**
     * Create a new Carbon instance from a specific Persian date and time.
     *
     * @author Reza Haghighi <reza.haghighi@gmail.com>
     *
     * * If $hour is null it will be set to its now() value and the default values
     * for $minute and $second will be their now() values.
     * If $hour is not null then the default values for $minute and $second
     * will be 0.
     *
     * @param int $jYear
     * @param int $jMonth
     * @param int $jDay
     * @param int $hour
     * @param int $minute
     * @param int $second
     * @param DateTimeZone|string $tz
     *
     * @return static Carbon
     */
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

    /**
     * Create a Carbon instance from just a Persian date. The time portion is set to now.
     *
     * @author Reza Haghighi <reza.haghighi@gmail.com>
     *
     * @param int $jYear
     * @param int $jMonth
     * @param int $jDay
     * @param DateTimeZone|string $tz
     *
     * @return static Carbon
     */
    public static function createFromPersianDate($jYear, $jMonth, $jDay, $tz = null)
    {
        list($year, $month, $day) = static::jalaliToGregorian($jYear, $jMonth, $jDay);

        return static::createFromDate($year, $month, $day, $tz);
    }
}
