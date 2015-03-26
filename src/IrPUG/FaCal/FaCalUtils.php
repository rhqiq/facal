<?php
namespace IrPUG\FaCal;

use IrPUG\FaCal\Lib\PersianDateTime;
use IntlDateFormatter;
use IntlCalendar;

/**
 *
 */
class FaCalUtils
{

    /**
     * The format constants
     */
    const NONE = IntlDateFormatter::NONE;
    const FULL = IntlDateFormatter::FULL;
    const LONG = IntlDateFormatter::LONG;
    const MEDIUM = IntlDateFormatter::MEDIUM;
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
     * Reset the TimeZone
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
     * Reset the format used to the default when type juggling a Carbon instance to a string
     *
     */
    public static function resetToStringFormat()
    {
        static::setToStringFormat(static::DEFAULT_TO_STRING_FORMAT);
    }

    /**
     * Set the default format used when type juggling a Carbon instance to a string
     *
     * @param string $format
     */
    public static function setToStringFormat($format)
    {
        static::$toStringFormat = $format;
    }

    public static function printDateTime(
        PersianDateTime $persianDateTime,
        $format = null,
        $locale = self::DEFAULT_LOCALE
    ) {
        return IntlDateFormatter::formatObject(
            IntlCalendar::fromDateTime($persianDateTime),
            $format,
            $locale
        );
    }
}
