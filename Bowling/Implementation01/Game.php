<?php

namespace Bowling\Implementation01;

use Bowling\Implementation01\Player;

class Game
{
    private $players;
    private $indexOfCurrentPlayer;

    public function __construct()
    {
        $this->players = array();
        $this->indexOfCurrentPlayer = 0;
    }

    public function addPlayer($player)
    {
        $this->players[] = $player;
    }

    public function firstPlayer()
    {
        return $this->players[0];
    }

    /**
     * @return Player
     */
    public function currentPlayer()
    {
        $indexOfCurrentPlayer = $this->indexOfCurrentPlayer;
        return $this->players[$indexOfCurrentPlayer];
    }

    public function currentPlayerLaunch($birilli)
    {
        $this->currentPlayer()->doLaunch($birilli);
    }

    public function currentPlayerMustLaunchAgain()
    {
        $currentPlayer = $this->currentPlayer();
        return $currentPlayer->hasOneMoreLaunch();
    }

    public function changeCurrentPlayer()
    {
        $this->currentPlayer()->leaveTurnToNextPlayer();
        $this->indexOfCurrentPlayer++;
    }
}
