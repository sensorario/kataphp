<?php

namespace Tests\Bowling\Implementation01;

use Bowling\Implementation01\Player;
use Bowling\Implementation01\PlayerMustLaunchTwoTimesException;
use Bowling\Implementation01\PlayerCanLaunchOneTimeException;
use PaperRockScissors\Implementation01\Game;

class PlayerTest extends \PHPUnit_Framework_TestCase
{

    public function testPlayerName()
    {
        $sam = new Player('Sam');
        $this->assertEquals($sam->getName(), 'Sam');
    }

    public function testPlayerStartsWithZeroPoints()
    {
        $sam = new Player('Sam');
        $this->assertEquals(0, $sam->hasPoints());
    }

    public function testFirstStrike()
    {
        $sam = new Player('Sam');
        $sam->doStrike();
        $this->assertEquals(10, $sam->hasPoints());
    }

    /**
     * @expectedException Bowling\Implementation01\PlayerCanLaunchOneTimeException
     */
    public function testSecondStrike()
    {
        $sam = new Player('Sam');
        $sam->doStrike();
        $sam->doStrike();
    }

    public function testTiriADisposizione()
    {
        $sam = new Player('Sam');
        $sam->doLaunch(3);
        $this->assertTrue($sam->hasOneMoreLaunch());
    }

    public function testTwoLaunchAvailability()
    {
        $sam = new Player('Sam');
        $sam->doLaunch(3);
        $sam->doLaunch(3);
        $this->assertFalse($sam->hasOneMoreLaunch());
    }

    public function testPlayerHasNotTwoLaunchAvailabilityAfterEndTurn()
    {
        $sam = new Player('Sam');
        $sam->doLaunch(3);
        $this->assertFalse($sam->hasTwoLaunchAvailability());
    }

    public function testTwoLaunchAvailabilityAfterEndTurn()
    {
        $sam = new Player('Sam');
        $sam->doLaunch(3);
        $sam->doLaunch(3);
        $sam->leaveTurnToNextPlayer();
        $this->assertTrue($sam->hasTwoLaunchAvailability());
    }

    /**
     * @expectedException Bowling\Implementation01\PlayerMustLaunchTwoTimesException
     */
    public function testPlayerMustLaunchTwoTimes()
    {
        $sam = new Player('Sam');
        $sam->doLaunch(3);
        $sam->leaveTurnToNextPlayer();
        $this->assertTrue($sam->hasTwoLaunchAvailability());
    }

    /**
     * @expectedException Bowling\Implementation01\PlayerMustLaunchTwoTimesException
     */
    public function testCantLeaveTurnWithoutLaunch()
    {
        $sam = new Player('Sam');
        $sam->leaveTurnToNextPlayer();
    }

    public function testCanLeaveTurnWithoutLaunch()
    {
        $sam = new Player('Sam');
        $sam->doLaunch(3);
        $sam->doLaunch(2);
        $this->assertTrue($sam->canLeaveTurnToNextPlayer());
    }

    public function testCannotLeaveTurnWithoutTwoLaunch()
    {
        $sam = new Player('Sam');
        $sam->doLaunch(3);
        $this->assertFalse($sam->canLeaveTurnToNextPlayer());
    }
}
