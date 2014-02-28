<?php

namespace Tests\DateTime;

use DateTime;

class DateTimeTest extends \PHPUnit_Framework_TestCase
{
    public function testWithFacebookBirthday()
    {
        $dateTime = new DateTime("May 30, 1980");
        $this->assertEquals("30/05/1980", $dateTime->format("d/m/Y"));
    }

    public function testAddInterval()
    {
        $dateTime = new DateTime("May 5, 1953");
        $intervalSpec = "P7D";
        $interval = new \DateInterval($intervalSpec);
        $dateTime->add($interval);
        $this->assertEquals("12/05/1953", $dateTime->format("d/m/Y"));
    }
}
