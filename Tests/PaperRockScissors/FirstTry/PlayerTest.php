<?php

namespace Tests\PaperRockScissors\FirstTry;

use PaperRockScissors\FirstTry\Paper;
use PaperRockScissors\FirstTry\Player;

class PlayerTest extends \PHPUnit_Framework_TestCase
{
    public function testValidPaperArgument()
    {
        $iPaper = $this
            ->getMockBuilder('PaperRockScissors\FirstTry\Choice')
            ->getMock();
        new Player($iPaper);
    }

    public function testGetChoice()
    {
        $paper = $this
            ->getMockBuilder('PaperRockScissors\FirstTry\Paper')
            ->getMock();
        $player = new Player($paper);
        $this->assertTrue($player->getChoice() === $paper);
    }

    public function testPlayerChoiceIsInstanceOfChoice()
    {
        $paper = new Paper();
        $player = new Player($paper);
        $this->assertInstanceOf('PaperRockScissors\FirstTry\Paper', $player->getChoice());
    }
}
