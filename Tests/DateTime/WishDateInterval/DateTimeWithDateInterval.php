<?php

namespace Tests\DateTime\WithDateInterval;

use DateInterval;
use DateTime;
use PHPUnit_Framework_TestCase;

class DateTimeWithDateInterval extends PHPUnit_Framework_TestCase
{
    const FORMAT = 'd/m/Y H:i:s';

    public function testFoo()
    {
        $tomorrow = new DateTime('tomorrow');

        $aDay = new DateTime('today');
        $aDay->modify('+1 day');

        $this->assertSame($tomorrow->format(self::FORMAT), $aDay->format(self::FORMAT));
    }

    public function testFooFoo()
    {
        $tomorrow = new DateTime('tomorrow');

        $aDay = new DateTime('today');
        $aDay->add(new DateInterval('P1D'));

        $this->assertSame($tomorrow->format(self::FORMAT), $aDay->format(self::FORMAT));
    }

    public function testFooFooTimer()
    {
        $tomorrow = new DateTime('tomorrow');

        $aDay = new DateTime('today');
        $aDay->add(new DateInterval('P1D'));

        $this->assertSame($tomorrow->format(self::FORMAT), $aDay->format(self::FORMAT));
    }
}
