<?php

namespace Tests\PaperRockScissors\Implementation01;

use PaperRockScissors\Implementation01\Paper;
use PaperRockScissors\Implementation01\Player;

class PlayerTest extends \PHPUnit_Framework_TestCase
{
    public function testValidPaperArgument()
    {
        $iPaper = $this
            ->getMockBuilder('PaperRockScissors\Implementation01\Choice')
            ->getMock();
        new Player($iPaper);
    }

    public function testGetChoice()
    {
        $paper = $this
            ->getMockBuilder('PaperRockScissors\Implementation01\Paper')
            ->getMock();
        $player = new Player($paper);
        $this->assertTrue($player->getChoice() === $paper);
    }

    public function testPlayerChoiceIsInstanceOfChoice()
    {
        $paper = new Paper();
        $player = new Player($paper);
        $this->assertInstanceOf('PaperRockScissors\Implementation01\Paper', $player->getChoice());
    }
}
