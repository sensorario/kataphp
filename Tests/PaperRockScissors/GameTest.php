<?php

class GameTest extends \PHPUnit_Framework_TestCase
{
    public function testGameExists()
    {
        $this->assertTrue(class_exists('PaperRockScissors\Game'));
    }

    public function testGameHasNoPlayers()
    {
        $game = new \PaperRockScissors\Game();
        $this->assertTrue(method_exists($game, 'hasNoPlayers'));
    }

    public function testHasNoPlayersReturnTrueByDefault()
    {
        $game = new \PaperRockScissors\Game();
        $this->assertTrue($game->hasNoPlayers());
    }

    public function testAddPlayers()
    {
        $game = new \PaperRockScissors\Game();
        $this->assertTrue(method_exists($game, 'addPlayer'));
    }

    public function testHasTwoPlayersMethodExists()
    {
        $game = new \PaperRockScissors\Game();
        $this->assertTrue(method_exists($game, 'hasTwoPlayers'));
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
            ->getMock();
        $game->addPlayer($stub);
        $this->assertFalse($game->hasTwoPlayers());
    }

    public function testHasTwoPlayerReturnTrueWithTwoPlayer()
    {
        $game = new \PaperRockScissors\Game();
        $stub = $this->getMockBuilder('PaperRockScissors\Player')
            ->getMock();
        $game->addPlayer($stub);
        $game->addPlayer($stub);
        $this->assertTrue($game->hasTwoPlayers());
    }
}
