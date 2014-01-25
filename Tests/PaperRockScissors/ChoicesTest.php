<?php

namespace Tests\PaperRockScissors;

use PaperRockScissors\Paper;
use PaperRockScissors\Rock;
use PaperRockScissors\Scissors;

class ChoicesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider choices
     */
    public function testIfPlayerOnesChoiceWins($playerOneChoice, $playerTwoChoice, $winFirst)
    {
        $this->assertEquals($winFirst, $playerOneChoice->winVersus($playerTwoChoice));
    }

    public function choices()
    {
        return [
            [new Paper(), new Rock(), true],
            [new Rock(), new Scissors(), true],
            [new Scissors(), new Paper(), true],
            [new Paper(), new Scissors(), false],
            [new Scissors(), new Rock(), false],
            [new Rock(), new Paper(), false],
        ];
    }
}
