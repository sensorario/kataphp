<?php

class PlayerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Exception
     */
    public function testInvalidArgument()
    {
        $player = new PaperRockScissors\Player(33);
    }

    public function testValidPaperArgument()
    {
        $iPaper = $this
            ->getMockBuilder('PaperRockScissors\IChoice')
            ->getMock();
        $player = new PaperRockScissors\Player($iPaper);
    }
}
