<?php

namespace Tests\Bowling\Implementation01;

use Bowling\Implementation01\Player;
use Bowling\Implementation01\PlayerMustLaunchTwoTimesException;

class BowlingTest extends \PHPUnit_Framework_TestCase
{
    public function testPlayerStartsWithZeroPoints()
    {
        $player = new Player();
        $this->assertEquals(0, $player->hasPoints());
    }

    public function testFirstStrike()
    {
        $player = new Player();
        $player->doStrike();
        $this->assertEquals(10, $player->hasPoints());
    }

    public function testSecondStrike()
    {
        $player = new Player();
        $player->doStrike();
        $player->doStrike();
        $this->assertEquals(30, $player->hasPoints());
    }

    public function testTiriADisposizione()
    {
        $player = new Player();
        $player->doLaunch(3);
        $this->assertTrue($player->hasOneMoreLaunch());
    }

    public function testTwoLaunchAvailability()
    {
        $player = new Player();
        $player->doLaunch(3);
        $player->doLaunch(3);
        $this->assertFalse($player->hasOneMoreLaunch());
    }

    public function testPlayerHasNotTwoLaunchAvailabilityAfterEndTurn()
    {
        $player = new Player();
        $player->doLaunch(3);
        $this->assertFalse($player->hasTwoLaunchAvailability());
    }

    public function testTwoLaunchAvailabilityAfterEndTurn()
    {
        $player = new Player();
        $player->doLaunch(3);
        $player->doLaunch(3);
        $player->leaveTurnToNextPlayer();
        $this->assertTrue($player->hasTwoLaunchAvailability());
    }

    /**
     * @expectedException Bowling\Implementation01\PlayerMustLaunchTwoTimesException
     */
    public function testPlayerMustLaunchTwoTimes()
    {
        $player = new Player();
        $player->doLaunch(3);
        $player->leaveTurnToNextPlayer();
        $this->assertTrue($player->hasTwoLaunchAvailability());
    }

//    public function testAllStrike()
//    {
//        $player = new Player();
//        for ($i = 0; $i <= 10; $i++) {
//            $player->doStrike();
//        }
//        $this->assertEquals(300, $player->hasPoints());
//    }
}
