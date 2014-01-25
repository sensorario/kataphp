<?php

namespace Tests\PaperRockScissors\Implementation02;

class GameWinsRule extends \PHPUnit_Framework_TestCase
{
    use DataStructure\MatrixGames;

    /**
     * @dataProvider gamesMatrix
     */
    public function testFirstChoiceWinsVersusSecondOne($tizioChoice, $caioChoice, $tizioWinVersusCaio)
    {
        $this->assertEquals($tizioWinVersusCaio, WinsRule::with($tizioChoice, $caioChoice));
    }
}
