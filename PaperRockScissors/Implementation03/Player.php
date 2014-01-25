<?php

namespace PaperRockScissors\Implementation03;

class Player
{
    const CHOICE_PAPER = 'paper';
    const CHOICE_ROCK = 'rock';
    const CHOICE_SCISSORS = 'scissors';

    private $choice;

    public function __construct($choice)
    {
        $this->choice = $choice;
    }

    public function buildFromChoice($choice)
    {
        return new Player($choice);
    }

    public function getChoice()
    {
        return $this->choice;
    }

    public function winVersus(Player $player)
    {
        return $this->choice == Player::CHOICE_SCISSORS && $player->choice == Player::CHOICE_PAPER
        || $this->choice == Player::CHOICE_PAPER && $player->choice == Player::CHOICE_ROCK
        || $this->choice == Player::CHOICE_ROCK && $player->choice == Player::CHOICE_SCISSORS;
    }
}
