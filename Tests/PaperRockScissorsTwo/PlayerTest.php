<?php

namespace PaperRockScissorsTwo;

use PaperRockScissorsTwo\DataStructure\PlayerChoice;

class PlayerTest extends \PHPUnit_Framework_TestCase
{
    use DataStructure\MatrixGames;

    /**
     * @dataProvider tizioSelections
     */
    public function testPlayerSelection($tizioSelection)
    {
        $tizio = new Player();
        $tizio->select($tizioSelection);
        $this->assertEquals($tizioSelection, $tizio->hasSelected());
    }

    public function tizioSelections()
    {
        return [
            [PlayerChoice::PAPER],
            [PlayerChoice::ROCK],
            [PlayerChoice::SCISSORS],
        ];
    }

    /**
     * @dataProvider gamesMatrix
     */
    public function testTizionWinsVersusCaio($tizioChoice, $caioChoice, $tizioWinVersusCaio)
    {
        $tizio = new Player();
        $tizio->select($tizioChoice);

        $caio = new Player();
        $caio->select($caioChoice);

        $this->assertEquals($tizioWinVersusCaio, $tizio->winVersus($caio));
    }
}
