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

use \DateTime;

/**
 *  An extended DateTime object that helps to create standard DateTime object by Persian date
 *
 * @author Reza Haghighi <reza.haghighi@gmail.com>
 */
class PersianDateTime extends DateTime
{
    /** Use JalaliCal trait */
    use JalaliCal;

    /**
     * Default format to use for __toString method when type juggling occurs.
     *
     * @var string
     */
    const DEFAULT_TO_STRING_FORMAT = 'Y-m-d H:i:s';

    /**
     * Sets the current date of the DateTime object to a different date based on Persian date
     *
     * @author Reza Haghighi <reza.haghighi@gmail.com>
     *
     * @param int $jYear
     * @param int $jMonth
     * @param int $jDay
     */
    public function setPersianDate($jYear, $jMonth, $jDay)
    {
        list($year, $month, $day) = $this->jalaliToGregorian($jYear, $jMonth, $jDay);
        $this->setDate($year, $month, $day);
    }

    /**
     * Format the instance as a string using the set format
     *
     * @author Reza Haghighi <reza.haghighi@gmail.com>
     *
     * @return string
     */
    public function __toString()
    {
        return $this->format(self::DEFAULT_TO_STRING_FORMAT);
    }
}
