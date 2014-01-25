<?php

namespace Tests\PaperRockScissorsTwo;

use PaperRockScissorsTwo\Player;
use PaperRockScissorsTwo\Game;

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
        $game->withPlayers($tizio, $caio);
        $this->assertEquals($tizioWinsVersusCaio, $game->isWinnedBy($tizio));
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
        $game->withPlayers($tizio, $caio);
        $this->assertEquals($caioLooseVersusTizio, $game->isLostBy($caio));
    }
}
