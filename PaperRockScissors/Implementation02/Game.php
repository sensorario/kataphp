<?php

namespace PaperRockScissors\Implementation02;

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

    public function createWithPlayers(Player $tizio, Player $caio)
    {
        $this->tizio = $tizio;
        $this->caio = $caio;
    }

    public function isWonBy(Player $player)
    {
        return $player->winVersus($this->caio);
    }

    public function isLostBy(Player $caio)
    {
        return !$caio->winVersus($this->tizio);
    }
}
