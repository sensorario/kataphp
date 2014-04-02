<?php

namespace Tests\DateInterval;

use DateTime\SpecialEventFinder\DateInterval;
use DateTime;
use PHPUnit_Framework_TestCase;

class DateIntervalTest extends PHPUnit_Framework_TestCase
{
    public function testDateInterval()
    {
        $dateInterval = new DateInterval('P2D');
        $this->assertEquals(new DateTime('-1 days'), $dateInterval->getDateFrom());
        $this->assertEquals(new DateTime('+6 days'), $dateInterval->getDateTo());
        $this->assertEquals(7, $dateInterval->daysRangeLength());
    }

    public function testSetBoundary()
    {
        $dateInterval = new DateInterval();
        $dateInterval->setDateFrom(new DateTime('-1 days'));
        $dateInterval->setDateTo(new DateTime('+2 days'));
        $this->assertEquals(new DateTime('-1 days'), $dateInterval->getDateFrom());
        $this->assertEquals(new DateTime('+2 days'), $dateInterval->getDateTo());
        $this->assertEquals(3, $dateInterval->daysRangeLength());
    }
}
