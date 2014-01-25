<?php

namespace Tests\PaperRockScissors\Implementation02;

use PaperRockScissors\Implementation02\Player;
use PaperRockScissors\Implementation02\Game;

class GameTest extends \PHPUnit_Framework_TestCase
{
    use DataStructure\MatrixGames;

    /**
     * @dataProvider gamesMatrix
     */
    public function testTizio($tizioChoice, $caioChoice, $tizioWinsVersusCaio)
    {
        $tizio = new Player();
        $tizio->select($tizioChoice);
        $caio = new Player();
        $caio->select($caioChoice);
        $game = new Game();
        $game->createWithPlayers($tizio, $caio);
        $this->assertEquals($tizioWinsVersusCaio, $game->isWonBy($tizio));
    }

    /**
     * @dataProvider gamesMatrix
     */
    public function testGameOptions($tizioChoice, $caioChoice, $caioLooseVersusTizio)
    {
        $tizio = new Player();
        $tizio->select($tizioChoice);
        $caio = new Player();
        $caio->select($caioChoice);
        $game = new Game();
        $game->createWithPlayers($tizio, $caio);
        $this->assertEquals($caioLooseVersusTizio, $game->isLostBy($caio));
    }
}
