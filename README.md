# facal

[![Latest Version](https://img.shields.io/github/release/thephpleague/:package_name.svg?style=flat-square)](https://github.com/thephpleague/:package_name/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

A collection of Persian date/time utilities to get and print DateTime Object in Persian formats based on Carbon, \DateTime and IntlCalendar.

## Requirements

PHP >= 5.3
Carbon Library  [http://carbon.nesbot.com](http://carbon.nesbot.com)
php intl extension 

## Install

Via Composer

``` bash
$ composer require irpug/facal
```

## Usage

``` php
ini_set('intl.default_locale', 'fa_IR');

require 'vendor/autoload.php';

use IrPUG\FaCal\Lib\PersianDateTime;
use IrPUG\FaCal\Lib\PersianCarbon;
use IrPUG\FaCal\FaCalUtils;

$date = new PersianDateTime();
$date->setPersianDate(1394, 2, 2);

var_dump($date);


var_dump(FaCalUtils::printDateTime($date, FaCalUtils::FULL));
var_dump(FaCalUtils::printDateTime($date, FaCalUtils::SHORT));
var_dump(FaCalUtils::printDateTime($date, FaCalUtils::NONE));
var_dump(FaCalUtils::printDateTime($date, FaCalUtils::LONG));
var_dump(FaCalUtils::printDateTime($date, FaCalUtils::MEDIUM));
var_dump(FaCalUtils::printDateTime($date, "EEEE, d 'of' MMMM y"));
var_dump(FaCalUtils::getYear($date));
var_dump(FaCalUtils::getMonthNum($date));
var_dump(FaCalUtils::getMonthName($date));
var_dump(FaCalUtils::getWeekdayName($date));
var_dump(FaCalUtils::getWeekdayNum($date));
var_dump(FaCalUtils::getQuarter($date));

var_dump(PersianCarbon::createFromPersianDate(1394, 1, 1)->addDay());
var_dump(FaCalUtils::printDateTime(PersianCarbon::createFromPersianDate(1394, 1, 1)->addDay(), FaCalUtils::FULL));
var_dump(PersianCarbon::createFromPersianDate(1393, 12, 28)->diffForHumans());
```


## Credits

- [Reza Haghighi](https://github.com/rhqiq)


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
