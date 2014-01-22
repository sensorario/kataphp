<?php

class GameTest extends \PHPUnit_Framework_TestCase
{
    public function testHasNoPlayersReturnTrueByDefault()
    {
        $game = new \PaperRockScissors\Game();
        $this->assertTrue($game->hasNoPlayers());
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testInvalidArgument()
    {
        $game = new \PaperRockScissors\Game();
        $game->addPlayer(33);
    }

    /**
     * @expectedException Exception
     */
    public function testAddPlayerDontAcceptTooManyArguments()
    {
        $game = new \PaperRockScissors\Game();
        $stub = $this->getMockBuilder('PaperRockScissors\Player')
            ->getMock();
        $game->addPlayer($stub, 33, 33);
    }

    public function testHasTwoPlayers()
    {
        $game = new \PaperRockScissors\Game();
        $stub = $this->getMockBuilder('PaperRockScissors\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $game->addPlayer($stub);
        $game->addPlayer($stub);
        $this->assertTrue($game->hasTwoPlayers());
    }

    public function testHasPlayerMethodExists()
    {
        $game = new \PaperRockScissors\Game();
        $this->assertTrue(method_exists($game, 'hasPlayers'));
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

    public function testHasTwoPlayerReturnTrueWithTwoPlayer()
    {
        $game = new \PaperRockScissors\Game();
        $stub = $this->getMockBuilder('PaperRockScissors\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $game->addPlayer($stub);
        $game->addPlayer($stub);
        $this->assertTrue($game->hasTwoPlayers());
    }
}
