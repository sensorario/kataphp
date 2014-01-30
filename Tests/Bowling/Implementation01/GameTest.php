<?php

namespace Tests\Bowling\Implementation01;

use Bowling\Implementation01\Game;
use Bowling\Implementation01\Player;

class GameTest extends \PHPUnit_Framework_TestCase
{
    public function testFirstPlayer()
    {
        $sam = new Player('Sam');
        $tom = new Player('Tom');

        $game = new Game();
        $game->addPlayer($sam);
        $game->addPlayer($tom);

        $this->assertTrue($game->firstPlayer() === $sam);
    }

    public function testPlayerTurn()
    {
        $sam = new Player('Sam');
        $tom = new Player('Tom');

        $game = new Game();
        $game->addPlayer($sam);
        $game->addPlayer($tom);

        $this->assertTrue($game->currentPlayer() === $sam);
    }

    public function testCurrentPlayer()
    {
        $sam = new Player('Sam');
        $tom = new Player('Tom');

        $game = new Game();
        $game->addPlayer($sam);
        $game->addPlayer($tom);

        $this->assertTrue($game->currentPlayer() === $sam);
    }

    public function testPlayerTurnAfterFirstLaunch()
    {
        $sam = new Player('Sam');
        $tom = new Player('Tom');

        $game = new Game();
        $game->addPlayer($sam);
        $game->addPlayer($tom);

        $game->currentPlayerLaunch(3);
        $this->assertTrue($game->currentPlayerMustLaunchAgain());
    }

    public function testPlayerTurnAfterSecondLaunch()
    {
        $sam = new Player('Sam');
        $tom = new Player('Tom');

        $game = new Game();
        $game->addPlayer($sam);
        $game->addPlayer($tom);

        $game->currentPlayerLaunch(3);
        $game->currentPlayerLaunch(3);
        $this->assertFalse($game->currentPlayerMustLaunchAgain());
    }

    /**
     * @expectedException Bowling\Implementation01\PlayerMustLaunchTwoTimesException
     */
    public function testChangeTurnException()
    {
        $sam = new Player('Sam');
        $tom = new Player('Tom');

        $game = new Game();
        $game->addPlayer($sam);
        $game->addPlayer($tom);

        $game->currentPlayerLaunch(3);
        $game->changeCurrentPlayer();
    }

    public function testChangeTurn()
    {
        $sam = new Player('Sam');
        $tom = new Player('Tom');

        $game = new Game();
        $game->addPlayer($sam);
        $game->addPlayer($tom);

        $game->currentPlayerLaunch(3);
        $game->currentPlayerLaunch(3);
        $game->changeCurrentPlayer();

        $currentPlayer = $game->currentPlayer();
        $this->assertTrue($currentPlayer === $tom);
    }

    public function testChangeTurnAfterStrike()
    {
        $sam = new Player('Sam');
        $tom = new Player('Tom');

        $game = new Game();
        $game->addPlayer($sam);
        $game->addPlayer($tom);

        $game->currentPlayerLaunch(10);
        $game->changeCurrentPlayer();

        $currentPlayer = $game->currentPlayer();
        $this->assertTrue($currentPlayer === $tom);
    }
}
