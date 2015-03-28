<?php
ini_set('intl.default_locale', 'fa_IR');
ini_set('date.timezone', 'Asia/Tehran');

require 'vendor/autoload.php';

use Carbon\Carbon;
use IrPUG\FaCal\Lib\PersianDateTime;
use IrPUG\FaCal\FaCalUtils;

//printf("Now: %s", Carbon::now());

//$datetime = new \DateTime();
//$datetime->setTimezone(new \DateTimeZone('Asia/Tehran'));
//dump($datetime->format('Y-m-d H:i:s'));

$pDate = new PersianDateTime();
$pDate->setPersianDate(1394, 2, 2);
//dump($pDate);

//$cal = IntlCalendar::createInstance();
//dump(
//    IntlDateFormatter::formatObject(
//        IntlCalendar::fromDateTime($pdate),
//        IntlDateFormatter::NONE
//    )
//);
//dump(IntlDateFormatter::formatObject(IntlCalendar::fromDateTime($datetime), "EEEE, d 'of' MMMM y"));

//$fmt = new NumberFormatter('fa_IR', NumberFormatter::IGNORE);
//dump($fmt->format(1234567));

dump(FaCalUtils::printDateTime($pDate, FaCalUtils::FULL));
dump(FaCalUtils::printDateTime($pDate, "EEEE, d 'of' MMMM y"));
dump(FaCalUtils::getYear($pDate));
dump(FaCalUtils::getMonthNum($pDate));
dump(FaCalUtils::getMonthName($pDate));
dump(FaCalUtils::getWeekdayName($pDate));
dump(FaCalUtils::getWeekdayNum($pDate));
dump(FaCalUtils::getQuarter($pDate));
