<?php

namespace PaperRockScissorsTwo;

class GameTest extends \PHPUnit_Framework_TestCase
{
    use DataStructure\MatrixGames;

    /**
     * @dataProvider gamesMatrix
     */
    public function testGameOptions($tizioChoice, $caioChoice, $tizioWinsVersusCaio)
    {
        $tizio = new Player();
        $tizio->select($tizioChoice);
        $caio = new Player();
        $caio->select($caioChoice);
        $game = new Game();
        $game->withPlayers($tizio, $caio);
        $this->assertEquals($tizioWinsVersusCaio, $game->isWinnedBy($tizio));
    }
}
