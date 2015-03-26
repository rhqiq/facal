<?php
namespace IrPUG\FaCal\Lib;

use \DateTime;

/**
 * Created by PhpStorm.
 * User: haghighi
 * Date: 3/25/15
 * Time: 5:15 PM

 */
class PersianDateTime extends DateTime
{
    use JalaliCal;

    /**
     * Default format to use for __toString method when type juggling occurs.
     *
     * @var string
     */
    const DEFAULT_TO_STRING_FORMAT = 'Y-m-d H:i:s';

    public function setPersianDate($jy, $jm, $jd)
    {
        list($gy, $gm, $gd) = $this->jalaliToGregorian($jy, $jm, $jd);
        $this->setDate($gy, $gm, $gd);
    }

    public function __toString()
    {
        return $this->format(self::DEFAULT_TO_STRING_FORMAT);
    }


}
