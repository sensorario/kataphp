<?php

namespace Tests\PaperRockScissors\Implementation04;

use PaperRockScissors\Implementation04\PlayerFactory;

class GameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider games
     */
    public function testWhoWon($first, $second, $firstWon)
    {
        $playerPaper = PlayerFactory::builder($first);
        $playerRock = PlayerFactory::builder($second);
        $this->assertEquals($firstWon, $playerPaper->winVersus($playerRock));
    }

    public function games()
    {
        return [
            ['paper', 'rock', true],
            ['rock', 'scissors', true],
            ['scissors', 'paper', true],
            ['paper', 'scissors', false],
            ['scissors', 'rock', false],
            ['rock', 'paper', false],
        ];
    }
}
