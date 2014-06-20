<?php

namespace Tests\Bowling\Implementation02;

use Bowling\Implementation02\Frame;
use Bowling\Implementation02\Shot;
use PHPUnit_Framework_TestCase;
use Tests\Bowling\Implementation02\Units\Bowling;

class FrameTest extends PHPUnit_Framework_TestCase
{
    public function testTwoShots()
    {
        $firstShot = $this->getMock('Bowling\Implementation02\Shot');
        $secondShot = $this->getMock('Bowling\Implementation02\Shot');

        $frame = (new Frame())
            ->runShot($firstShot)
            ->runShot($secondShot);

        $this->assertSame($firstShot, $frame->getFirstShot());
        $this->assertSame($secondShot, $frame->getSecondShot());
    }

    /**
     * @expectedException Bowling\Implementation02\Exceptions\OnlyTwoShotsAvailableException
     */
    public function testOnlyTwoShots()
    {
        $firstShot = $this->getMock('Bowling\Implementation02\Shot');
        $secondShot = $this->getMock('Bowling\Implementation02\Shot');
        $thirdShot = $this->getMock('Bowling\Implementation02\Shot');

        (new Frame())
            ->runShot($firstShot)
            ->runShot($secondShot)
            ->runShot($thirdShot);
    }

    /**
     * @dataProvider frameShots
     */
    public function testSingleFramePoints($firstShotKills, $secondShotKills, $total)
    {
        $firstShot = (new Shot())
            ->billsKilled($firstShotKills);

        $secondShot = (new Shot())
            ->billsKilled($secondShotKills);

        $frame = (new Frame())
            ->runShot($firstShot)
            ->runShot($secondShot);

        $billsKilledInFrame = $frame->getBillsKilledInFrame();

        $this->assertEquals($total, $billsKilledInFrame);
        $this->assertSame(false, $frame->isStrike());
        $this->assertSame(false, $frame->isSpare());
    }

    public function frameShots()
    {
        return [
            [3, 4, 7],
            [1, 5, 6],
        ];
    }

    public function testSpare(){
        $firstShot = (new Shot())
            ->billsKilled(5);

        $secondShot = (new Shot())
            ->billsKilled(5);

        $frame = (new Frame())
            ->runShot($firstShot)
            ->runShot($secondShot);

        $this->assertSame(false, $frame->isStrike());
        $this->assertSame(true, $frame->isSpare());
    }

    /**
     * @expectedException Bowling\Implementation02\Exceptions\TooManyShotsException
     */
    public function testStrike(){
        $firstShot = (new Shot())
            ->billsKilled(10);

        $secondShot = (new Shot())
            ->billsKilled(0);

        (new Frame())
            ->runShot($firstShot)
            ->runShot($secondShot);
    }
}
