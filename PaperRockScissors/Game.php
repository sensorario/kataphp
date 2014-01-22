<?php

namespace PaperRockScissors;

class Game
{
    private $players = array();

    public function hasNoPlayers()
    {
        return $this->getNumPlayersCount() == 0;
    }

    public function addPlayer(Player $player)
    {
        if (func_num_args() != 1) {
            throw new \Exception;
        }

        array_push($this->players, $player);
    }

    public function hasTwoPlayers()
    {
        return $this->getNumPlayersCount() == 2;
    }

    public function hasPlayers()
    {
        return !$this->hasNoPlayers();
    }

    private function getNumPlayersCount()
    {
        return count($this->players);
    }
}
