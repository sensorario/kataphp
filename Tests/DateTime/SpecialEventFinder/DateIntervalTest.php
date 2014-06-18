<?php

namespace Tests\DateTime\SpecialEventFinder;

use DateTime\SpecialEventFinder\DateInterval;
use DateTime;
use PHPUnit_Framework_TestCase;

class DateIntervalTest extends PHPUnit_Framework_TestCase
{
    public function testDatesRange()
    {
        $finder = new DateInterval();
        $finder->setDateFrom(new DateTime("-3 days"));
        $finder->setDateTo(new DateTime("+4 days"));
        $this->assertEquals(7, $finder->daysRangeLength());
    }

    public function testRangeStartsFromYesterday()
    {
        $defaultRange = new DateInterval();
        $this->assertEquals($defaultRange->getDateFrom()->format('d/m/Y'), (new DateTime("-1 days"))->format('d/m/Y'));
    }

    public function testRangeEndsToSixDays()
    {
        $defaultRange = new DateInterval();
        $this->assertEquals($defaultRange->getDateTo(), new DateTime("+6 days"));
    }

    /**
     * @dataProvider datesInside
     */
    public function testDateIsInsideInterval(DateTime $dateTime)
    {
        $interval = new DateInterval();
        $this->assertTrue($interval->contains($dateTime));
    }

    public function datesInside()
    {
        return [
            [new DateTime("-1 days")],
            [new DateTime()],
            [new DateTime("+1 days")],
            [new DateTime("+2 days")],
            [new DateTime("+3 days")],
            [new DateTime("+4 days")],
            [new DateTime("+5 days")],
            [new DateTime("+6 days")],
        ];
    }

    /**
     * @dataProvider datesOutside
     */
    public function testDateIsNotInsideInterval(DateTime $date)
    {
        $interval = new DateInterval();
        $this->assertFalse($interval->contains($date));
    }

    public function datesOutside()
    {
        return [
            [new DateTime("+33 days")],
            [new DateTime("-11 days")],
        ];
    }

    public function testDateTimeFormat()
    {
        $dateTime = new DateTime("05/30/1982");
        $this->assertEquals("May 30", $dateTime->format("M d"));
    }

    public function testDateTimeStartsFrom_00_00_00()
    {
        $interval = new DateInterval();
        $this->assertEquals('00:00:00', $interval->getDateFrom()->format('H:i:s'));
    }
}
