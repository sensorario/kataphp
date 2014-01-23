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
        if (isset($this->players[0])) {
            if ($player === $this->players[0]) {
                throw new SamePlayerException();
            }
        }

        array_push($this->players, $player);
    }

    public function hasTwoPlayers()
    {
        return $this->getNumPlayersCount() == 2;
    }

    /**
     * @return Player
     */
    public function getPlayerOne()
    {
        return $this->players[0];
    }

    /**
     * @return Player
     */
    public function getPlayerTwo()
    {
        return $this->players[1];
    }

    public function isPlayerOneWinner()
    {
        $playerOneChoice = $this->getPlayerOne()->getChoice();
        $playerTwoChoice = $this->getPlayerTwo()->getChoice();
        return $playerOneChoice->winVersus($playerTwoChoice);
    }

    public function isGameTied()
    {
        return $this->getPlayerOne()->getChoice() == $this->getPlayerTwo()->getChoice();
    }

    public function getNumPlayersCount()
    {
        return count($this->players);
    }
}
