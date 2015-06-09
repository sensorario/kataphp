<?php

namespace Tests\Bowling\Implementation02;

use Bowling\Implementation02\Shot;
use PHPUnit_Framework_TestCase;
use Tests\Bowling\Implementation02\Bowling;

class ShotTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Bowling\Implementation02\Exceptions\AnyShotsPerformedException
     */
    public function testShotMustBePerformed()
    {
        $shot = new Shot();
        $shot->getNumberOfBillsBilled();
    }

    /**
     * @dataProvider shots
     */
    public function testShotPerformed($billsKilled)
    {
        $shot = new Shot();
        $shot->billsKilled($billsKilled);
        $this->assertEquals($billsKilled, $shot->getNumberOfBillsBilled());
    }

    public function shots()
    {
        return [
            [3],
            [4],
        ];
    }

    public function testBillsNotKilled()
    {
        $shot = new Shot();
        $shot->billsKilled(2);
        $this->assertEquals(8, $shot->billsNotKilled());
    }

    /**
     * @expectedException Bowling\Implementation02\Exceptions\AlreadyPerformedException
     */
    public function testAlreadyPerformedException()
    {
        $shot = new Shot();
        $shot->billsKilled(4);
        $shot->billsKilled(4);
    }
}
