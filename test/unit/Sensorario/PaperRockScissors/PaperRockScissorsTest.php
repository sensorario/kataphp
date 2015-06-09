<?php
namespace Sensorario\PaperRockScissors;

use PHPUnit_Framework_TestCase;

final class PaperRockScissorsTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider playerChoices
     */
    public function testRockWinScissorsWinPaper($win, $first, $second)
    {
        $this->assertEquals(
            $win,
            $first->winVersus($second)
        );
    }

    public function playerChoices()
    {
        return [
            [true, new Paper(), new Rock()],
            [false, new Paper(), new Scissors()],
            [true, new Scissors(), new Paper()],
            [false, new Scissors(), new Rock()],
            [true, new Rock(), new Scissors()],
            [false, new Rock(), new Paper()],
        ];
    }
}
