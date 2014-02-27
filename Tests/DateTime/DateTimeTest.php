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
}
