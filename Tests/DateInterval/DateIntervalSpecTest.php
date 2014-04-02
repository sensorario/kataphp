<?php

namespace Tests\DateInterval;

use PHPUnit_Framework_TestCase;
use DateInterval\DateIntervalSpec;

class DateIntervalSpecTest extends PHPUnit_Framework_TestCase
{
    public function testClass()
    {
        $dateIntervalSpec = (new DateIntervalSpec());

        $this->assertEquals('P', $dateIntervalSpec);
    }
}
