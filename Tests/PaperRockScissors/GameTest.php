<?php

class GameTest extends \PHPUnit_Framework_TestCase
{
    public function testHasNoPlayersReturnTrueByDefault()
    {
        $game = new \PaperRockScissors\Game();
        $this->assertTrue($game->hasNoPlayers());
    }

    public function testHasTwoPlayers()
    {
        $game = new \PaperRockScissors\Game();
        $playerOne = $this->getMockBuilder('PaperRockScissors\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $playerTwo = $this->getMockBuilder('PaperRockScissors\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $game->addPlayer($playerOne);
        $game->addPlayer($playerTwo);
        $this->assertTrue($game->hasTwoPlayers());
    }

    public function testHasTwoPlayerReturnFalseByDefault()
    {
        $game = new \PaperRockScissors\Game();
        $this->assertFalse($game->hasTwoPlayers());
    }

    public function testHasTwoPlayerReturnFalseWithOnePlayer()
    {
        $game = new \PaperRockScissors\Game();
        $stub = $this->getMockBuilder('PaperRockScissors\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $game->addPlayer($stub);
        $this->assertFalse($game->hasTwoPlayers());
    }

    /**
     * @expectedException PaperRockScissors\SamePlayerException
     */
    public function testPlayersMustBeDifferent()
    {
        $game = new \PaperRockScissors\Game();
        $stub = $this->getMockBuilder('PaperRockScissors\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $game->addPlayer($stub);
        $game->addPlayer($stub);
    }

    public function testGetPlayerOne()
    {
        $player = $this->getMockBuilder('PaperRockScissors\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $game = new \PaperRockScissors\Game();
        $game->addPlayer($player);
        $this->assertEquals($player, $game->getPlayerOne());
    }

    public function testGetPlayerTwo()
    {
        $player = $this->getMockBuilder('PaperRockScissors\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $playerTwo = $this->getMockBuilder('PaperRockScissors\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $game = new \PaperRockScissors\Game();
        $game->addPlayer($player);
        $game->addPlayer($playerTwo);
        $this->assertEquals($playerTwo, $game->getPlayerTwo());
    }

    public function testPlayersAreDifferent()
    {
        $player = $this->getMockBuilder('PaperRockScissors\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $playerTwo = $this->getMockBuilder('PaperRockScissors\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $game = new \PaperRockScissors\Game();
        $game->addPlayer($player);
        $game->addPlayer($playerTwo);
        $this->assertFalse($game->getPlayerOne() === $game->getPlayerTwo());
    }

    public function testPlayerOneWithPaperWinsVersusPlayerTwoWithRock()
    {
        $game = new \PaperRockScissors\Game();
        $game->addPlayer(new \PaperRockScissors\Player(new \PaperRockScissors\Paper()));
        $game->addPlayer(new \PaperRockScissors\Player(new \PaperRockScissors\Rock()));
        $this->assertTrue($game->isPlayerOneWinner());
    }

    public function testNotIsPlayerOneWinner()
    {
        $game = new \PaperRockScissors\Game();
        $game->addPlayer(new \PaperRockScissors\Player(new \PaperRockScissors\Rock()));
        $game->addPlayer(new \PaperRockScissors\Player(new \PaperRockScissors\Paper()));
        $this->assertFalse($game->isPlayerOneWinner());
    }

    /**
     * @dataProvider gamesTied
     */
    public function testIsGameTied($playerOne, $playerTwo, $expected)
    {
        $game = new \PaperRockScissors\Game();
        $game->addPlayer(new \PaperRockScissors\Player($playerOne));
        $game->addPlayer(new \PaperRockScissors\Player($playerTwo));
        $this->assertEquals($expected, $game->isGameTied());
    }

    public function gamesTied()
    {
        return [
            [new \PaperRockScissors\Paper(), new \PaperRockScissors\Paper(), true],
            [new \PaperRockScissors\Rock(), new \PaperRockScissors\Rock(), true],
            [new \PaperRockScissors\Scissors(), new \PaperRockScissors\Rock(), false],
            [new \PaperRockScissors\Scissors(), new \PaperRockScissors\Scissors(), true],
            [new \PaperRockScissors\Scissors(), new \PaperRockScissors\Paper(), false],
        ];
    }

    public function testNumPlayerCount()
    {
        $game = new \PaperRockScissors\Game();
        $numPlayerBegin = $game->getNumPlayersCount();
        $game->addPlayer(new \PaperRockScissors\Player(new \PaperRockScissors\Paper()));
        $this->assertEquals($numPlayerBegin + 1, $game->getNumPlayersCount());
    }

    public function testHasPlayers()
    {
        $game = new \PaperRockScissors\Game();
        $game->addPlayer(new \PaperRockScissors\Player(new \PaperRockScissors\Paper()));
        $this->assertFalse($game->hasNoPlayers());
    }
}
