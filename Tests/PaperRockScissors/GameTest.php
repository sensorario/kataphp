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
        $rock = $this->getMockBuilder('PaperRockScissors\Rock')
            ->getMock();

        $paper = $this->getMockBuilder('PaperRockScissors\Paper')
            ->setMethods(['winVersus'])
            ->getMock();
        $paper->expects($this->any())
            ->method('winVersus')
            ->with($rock)
            ->will($this->returnValue(true));

        $playerOneWithPaper = $this->getMockBuilder('PaperRockScissors\Player')
            ->setConstructorArgs([$paper])
            ->getMock();
        $playerOneWithPaper->expects($this->any())
            ->method('getChoice')
            ->will($this->returnValue($paper));

        $playerTwoWithRock = $this->getMockBuilder('PaperRockScissors\Player')
            ->setConstructorArgs([$rock])
            ->getMock();
        $playerTwoWithRock->expects($this->any())
            ->method('getChoice')
            ->will($this->returnValue($rock));

        $game = new \PaperRockScissors\Game();
        $game->addPlayer($playerOneWithPaper);
        $game->addPlayer($playerTwoWithRock);
        $this->assertTrue($game->isPlayerOneWinner());
    }
}
