<?php

class PlayerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Exception
     */
    public function testInvalidArgument()
    {
        new PaperRockScissors\Player(33);
    }

    public function testValidPaperArgument()
    {
        $iPaper = $this
            ->getMockBuilder('PaperRockScissors\IChoice')
            ->getMock();
        new PaperRockScissors\Player($iPaper);
    }

    public function testGetChoice()
    {
        $paper = new \PaperRockScissors\Paper();
        $player = new \PaperRockScissors\Player($paper);
        $this->assertTrue($player->getChoice() === $paper);
    }
}
