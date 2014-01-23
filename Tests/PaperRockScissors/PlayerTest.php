<?php

use PaperRockScissors\Paper;
use PaperRockScissors\Player;

class PlayerTest extends \PHPUnit_Framework_TestCase
{
    public function testValidPaperArgument()
    {
        $iPaper = $this
            ->getMockBuilder('PaperRockScissors\Choice')
            ->getMock();
        new Player($iPaper);
    }

    public function testGetChoice()
    {
        $paper = $this
            ->getMockBuilder('PaperRockScissors\Paper')
            ->getMock();
        $player = new Player($paper);
        $this->assertTrue($player->getChoice() === $paper);
    }

    public function testPlayerChoiceIsInstanceOfChoice()
    {
        $paper = new Paper();
        $player = new Player($paper);
        $this->assertInstanceOf('PaperRockScissors\Paper', $player->getChoice());
    }
}
