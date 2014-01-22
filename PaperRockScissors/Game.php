<?php

namespace PaperRockScissors;

class Game
{
    private $players = array();

    public function hasNoPlayers()
    {
        return count($this->players) == 0;
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
        return count($this->players) == 2;
    }

    public function hasPlayers()
    {
        return !$this->hasNoPlayers();
    }
}
