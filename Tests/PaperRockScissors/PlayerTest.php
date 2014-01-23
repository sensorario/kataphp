<?php

class PlayerTest extends \PHPUnit_Framework_TestCase
{
    public function testValidPaperArgument()
    {
        $iPaper = $this
            ->getMockBuilder('PaperRockScissors\IChoice')
            ->getMock();
        new PaperRockScissors\Player($iPaper);
    }

    public function testGetChoice()
    {
        $paper = $this
            ->getMockBuilder('PaperRockScissors\Paper')
            ->getMock();
        $player = new \PaperRockScissors\Player($paper);
        $this->assertTrue($player->getChoice() === $paper);
    }

    public function testChoiceClass()
    {
        $paper = new \PaperRockScissors\Paper();
        $player = new \PaperRockScissors\Player($paper);
        $this->assertInstanceOf('PaperRockScissors\Paper', $player->getChoice());
    }
}
