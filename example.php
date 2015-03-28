<?php
//ini_set('intl.default_locale', 'fa_IR');
//ini_set('date.timezone', 'Asia/Tehran');

require 'vendor/autoload.php';

use IrPUG\FaCal\Lib\PersianDateTime;
use IrPUG\FaCal\Lib\PersianCarbon;
use IrPUG\FaCal\FaCalUtils;

$date = new PersianDateTime();
$date->setPersianDate(1394, 2, 2);
dump($date);


dump(FaCalUtils::printDateTime($date, FaCalUtils::FULL));
dump(FaCalUtils::printDateTime($date, FaCalUtils::SHORT));
dump(FaCalUtils::printDateTime($date, FaCalUtils::NONE));
dump(FaCalUtils::printDateTime($date, FaCalUtils::LONG));
dump(FaCalUtils::printDateTime($date, FaCalUtils::MEDIUM));
dump(FaCalUtils::printDateTime($date, "EEEE, d 'of' MMMM y"));
dump(FaCalUtils::getYear($date));
dump(FaCalUtils::getMonthNum($date));
dump(FaCalUtils::getMonthName($date));
dump(FaCalUtils::getWeekdayName($date));
dump(FaCalUtils::getWeekdayNum($date));
dump(FaCalUtils::getQuarter($date));

dump(PersianCarbon::createFromPersianDate(1394, 1, 1)->addDay());
dump(FaCalUtils::printDateTime(PersianCarbon::createFromPersianDate(1394, 1, 1)->addDay(), FaCalUtils::FULL));
