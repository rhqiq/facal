<?php

/*
 * This file is part of the facal package.
 *
 * (c) IrPUG https://github.com/irpug
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace IrPUG\FaCal;

use DateTime;
use IntlDateFormatter;
use IntlCalendar;

/**
 *  A collection of persian date / time utilities as a wrapper for standard php datetime libraries
 *  such as \Datetime and IntlCalendar
 *
 * @author Reza Haghighi <reza.haghighi@gmail.com>
 */

class FaCalUtils
{

    /**
     * A default date format, Do not include this element
     */
    const NONE = IntlDateFormatter::NONE;

    /**
     * A default date format
     * @example Completely specified style (Tuesday, April 12, 1952 AD or 3:30:42pm PST)
     */
    const FULL = IntlDateFormatter::FULL;

    /**
     * A default date format
     * @example Long style (January 12, 1952 or 3:30:32pm)
     */
    const LONG = IntlDateFormatter::LONG;

    /**
     * A default date format
     * @example Medium style (Jan 12, 1952)
     */
    const MEDIUM = IntlDateFormatter::MEDIUM;

    /**
     * A default date format
     * @example Most abbreviated style, only essential data (12/13/52 or 3:30pm)
     */
    const SHORT = IntlDateFormatter::SHORT;

    /**
     * @var string
     */
    const DEFAULT_LOCALE = 'fa_IR';

    /**
     * @var string
     */
    protected static $locale = self::DEFAULT_LOCALE;

    /**
     * @var string
     */
    const DEFAULT_TIME_ZONE = 'Asia/Tehran';

    /**
     * @var string
     */
    protected static $timeZone = self::DEFAULT_TIME_ZONE;

    /**
     * Default format to use for __toString method when type juggling occurs.
     *
     * @var string
     */
    const DEFAULT_TO_STRING_FORMAT = 'Y-m-d H:i:s';

    /**
     * Format to use for __toString method when type juggling occurs.
     *
     * @var string
     */
    protected static $toStringFormat = self::DEFAULT_TO_STRING_FORMAT;


    /**
     * Reset the locale used to the default
     *
     */
    public static function resetLocale()
    {
        static::setLocale(static::DEFAULT_LOCALE);
    }

    /**
     * Set the locale
     *
     * @param string $locale
     */
    public static function setLocale($locale)
    {
        static::$locale = $locale;
    }

    /**
     * Reset the TimeZone to the default
     *
     */
    public static function resetTimeZone()
    {
        static::setTimeZone(static::DEFAULT_TO_STRING_FORMAT);
    }

    /**
     * @param string $timeZone
     */
    public static function setTimeZone($timeZone)
    {
        static::$timeZone = $timeZone;
    }

    /**
     * Reset the date format used to the default
     *
     */
    public static function resetToStringFormat()
    {
        static::setToStringFormat(static::DEFAULT_TO_STRING_FORMAT);
    }

    /**
     * Set the default format
     *
     * @param string $format
     */
    public static function setToStringFormat($format)
    {
        static::$toStringFormat = $format;
    }

    /**
     * Print datetime in intl standard format based on locale
     *
     * @see http://www.icu-project.org/apiref/icu4c/classSimpleDateFormat.html#details
     * @see http://php.net/manual/en/class.intldateformatter.php
     *
     * @example FaCalUtils::printDateTime($dateTimeObj, FaCalUtils::FULL)
     * @example FaCalUtils::printDateTime($$dateTimeObj, "EEEE, d 'of' MMMM y")
     *
     * @author Reza Haghighi <reza.haghighi@gmail.com>
     *
     * @param DateTime $dateTimeObj
     * @param null $format
     * @param string $locale
     * @return string
     */
    public static function printDateTime(
        DateTime $dateTimeObj,
        $format = null,
        $locale = self::DEFAULT_LOCALE
    ) {
        return IntlDateFormatter::formatObject(
            IntlCalendar::fromDateTime($dateTimeObj),
            $format,
            $locale
        );
    }

    /**
     * Get year of DateTime Object
     *
     * @author Reza Haghighi <reza.haghighi@gmail.com>
     *
     * @param DateTime $dateTimeObj
     * @param string $locale
     *
     * @return string
     */
    public static function getYear(
        DateTime $dateTimeObj,
        $locale = self::DEFAULT_LOCALE
    ) {
        return IntlDateFormatter::formatObject(
            IntlCalendar::fromDateTime($dateTimeObj),
            'Y',
            $locale
        );
    }

    /**
     * Get month number of DateTime Object
     *
     * @author Reza Haghighi <reza.haghighi@gmail.com>
     *
     * @param DateTime $dateTimeObj
     * @param string $locale
     *
     * @return string
     */
    public static function getMonthNum(
        DateTime $dateTimeObj,
        $locale = self::DEFAULT_LOCALE
    ) {
        return IntlDateFormatter::formatObject(
            IntlCalendar::fromDateTime($dateTimeObj),
            'M',
            $locale
        );
    }

    /**
     * Get month name of DateTime Object
     *
     * @author Reza Haghighi <reza.haghighi@gmail.com>
     *
     * @param DateTime $dateTimeObj
     * @param string $locale
     *
     * @return string
     */
    public static function getMonthName(
        DateTime $dateTimeObj,
        $locale = self::DEFAULT_LOCALE
    ) {
        return IntlDateFormatter::formatObject(
            IntlCalendar::fromDateTime($dateTimeObj),
            'MMMM',
            $locale
        );
    }

    /**
     * Get weekday name of DateTime Object
     *
     * @author Reza Haghighi <reza.haghighi@gmail.com>
     *
     * @param DateTime $dateTimeObj
     * @param string $locale
     *
     * @return string
     */
    public static function getWeekdayName(
        DateTime $dateTimeObj,
        $locale = self::DEFAULT_LOCALE
    ) {
        return IntlDateFormatter::formatObject(
            IntlCalendar::fromDateTime($dateTimeObj),
            'EEEE',
            $locale
        );
    }

    /**
     * Get weekday number of DateTime Object
     *
     * @author Reza Haghighi <reza.haghighi@gmail.com>
     *
     * @param DateTime $dateTimeObj
     * @param string $locale
     *
     * @return string
     */
    public static function getWeekdayNum(
        DateTime $dateTimeObj,
        $locale = self::DEFAULT_LOCALE
    ) {
        return IntlDateFormatter::formatObject(
            IntlCalendar::fromDateTime($dateTimeObj),
            'e',
            $locale
        );
    }

    /**
     * Get quarter number of DateTime Object
     *
     * @author Reza Haghighi <reza.haghighi@gmail.com>
     *
     * @param DateTime $dateTimeObj
     * @param string $locale
     *
     * @return string
     */
    public static function getQuarter(
        DateTime $dateTimeObj,
        $locale = self::DEFAULT_LOCALE
    ) {
        return IntlDateFormatter::formatObject(
            IntlCalendar::fromDateTime($dateTimeObj),
            'Q',
            $locale
        );
    }
}
