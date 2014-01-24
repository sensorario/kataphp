<?php

namespace PaperRockScissorsTwo;

use PaperRockScissorsTwo\DataStructure\WinsRule;

class Game
{
    /**
     * @var Player
     */
    private $tizio;

    /**
     * @var Player
     */
    private $caio;

    public function withPlayers(Player $tizio, Player $caio)
    {
        $this->tizio = $tizio;
        $this->caio = $caio;
    }

    public function isWinnedBy(Player $player)
    {
        $expectedWinner = $this->tizio === $player;
        $tizioSelection = $this->tizio->hasSelected();
        $caioSelection = $this->caio->hasSelected();
        $tizioWinsVersusCaio = WinsRule::with($tizioSelection, $caioSelection);
        return $tizioWinsVersusCaio && $expectedWinner;
    }
}
