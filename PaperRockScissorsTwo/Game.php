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
        return $player->winVersus($this->caio);
    }

    public function isLostBy(Player $caio)
    {
        return !$caio->winVersus($this->tizio);
    }
}
