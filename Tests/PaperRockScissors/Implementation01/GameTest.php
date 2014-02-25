<?php

namespace Tests\PaperRockScissors\Implementation01;

use PaperRockScissors\Implementation01\Game;
use PaperRockScissors\Implementation01\Player;
use PaperRockScissors\Implementation01\Paper;
use PaperRockScissors\Implementation01\Rock;
use PaperRockScissors\Implementation01\Scissors;

class GameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Game
     */
    private $game;

    public function setUp()
    {
        $this->game = new Game();
    }

    public function testHasNoPlayersReturnTrueByDefault()
    {
        $this->assertTrue($this->game->hasNoPlayers());
    }

    public function testHasTwoPlayers()
    {
        $playerOne = $this->getMockBuilder('PaperRockScissors\Implementation01\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $playerTwo = $this->getMockBuilder('PaperRockScissors\Implementation01\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $this->game->addPlayer($playerOne);
        $this->game->addPlayer($playerTwo);
        $this->assertTrue($this->game->hasTwoPlayers());
    }

    public function testHasTwoPlayerReturnFalseByDefault()
    {
        $this->assertFalse($this->game->hasTwoPlayers());
    }

    public function testHasTwoPlayerReturnFalseWithOnePlayer()
    {
        $stub = $this->getMockBuilder('PaperRockScissors\Implementation01\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $this->game->addPlayer($stub);
        $this->assertFalse($this->game->hasTwoPlayers());
    }

    /**
     * @expectedException PaperRockScissors\Implementation01\SamePlayerException
     */
    public function testPlayersMustBeDifferent()
    {
        $stub = $this->getMockBuilder('PaperRockScissors\Implementation01\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $this->game->addPlayer($stub);
        $this->game->addPlayer($stub);
    }

    public function testGetPlayerOne()
    {
        $player = $this->getMockBuilder('PaperRockScissors\Implementation01\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $this->game->addPlayer($player);
        $this->assertEquals($player, $this->game->getPlayerOne());
    }

    public function testGetPlayerTwo()
    {
        $player = $this->getMockBuilder('PaperRockScissors\Implementation01\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $playerTwo = $this->getMockBuilder('PaperRockScissors\Implementation01\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $this->game->addPlayer($player);
        $this->game->addPlayer($playerTwo);
        $this->assertEquals($playerTwo, $this->game->getPlayerTwo());
    }

    public function testPlayersAreDifferent()
    {
        $player = $this->getMockBuilder('PaperRockScissors\Implementation01\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $playerTwo = $this->getMockBuilder('PaperRockScissors\Implementation01\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $this->game->addPlayer($player);
        $this->game->addPlayer($playerTwo);
        $this->assertFalse($this->game->getPlayerOne() === $this->game->getPlayerTwo());
    }

    public function testPlayerOneWithPaperWinsVersusPlayerTwoWithRock()
    {
        $this->game->addPlayer(new Player(new Paper()));
        $this->game->addPlayer(new Player(new Rock()));
        $this->assertTrue($this->game->isPlayerOneWinner());
    }

    public function testNotIsPlayerOneWinner()
    {
        $this->game->addPlayer(new Player(new Rock()));
        $this->game->addPlayer(new Player(new Paper()));
        $this->assertFalse($this->game->isPlayerOneWinner());
    }

    /**
     * @dataProvider gamesTied
     */
    public function testIsGameTied($playerOne, $playerTwo, $expected)
    {
        $this->game->addPlayer(new Player($playerOne));
        $this->game->addPlayer(new Player($playerTwo));
        $this->assertEquals($expected, $this->game->isGameTied());
    }

    public function gamesTied()
    {
        return [
            [new Paper(), new Paper(), true],
            [new Rock(), new Rock(), true],
            [new Scissors(), new Rock(), false],
            [new Scissors(), new Scissors(), true],
            [new Scissors(), new Paper(), false],
        ];
    }

    public function testNumPlayerCount()
    {
        $numPlayerBegin = $this->game->numberOfPlayers();
        $this->game->addPlayer(new Player(new Paper()));
        $this->assertEquals($numPlayerBegin + 1, $this->game->numberOfPlayers());
    }

    public function testHasPlayers()
    {
        $this->game->addPlayer(new Player(new Paper()));
        $this->assertFalse($this->game->hasNoPlayers());
    }
}
