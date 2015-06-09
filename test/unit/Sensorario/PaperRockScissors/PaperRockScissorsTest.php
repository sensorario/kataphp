<?php
namespace Sensorario\PaperRockScissors;

use PHPUnit_Framework_TestCase;

final class PaperRockScissorsTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider playerChoices
     */
    public function testRockWinScissorsWinPaper($firstWins, $first, $second)
    {
        $this->assertEquals(
            $firstWins,
            $first->winVersus($second)
        );
    }

    public function playerChoices()
    {
        return [
            [false, new Paper(), new Scissors()],
            [false, new Rock(), new Paper()],
            [false, new Scissors(), new Rock()],
            [true, new Paper(), new Rock()],
            [true, new Rock(), new Scissors()],
            [true, new Scissors(), new Paper()],
        ];
    }
}
