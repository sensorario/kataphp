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

    /**
     * @param $choice
     * @return Player
     * @throws InvalidArgumentException
     */
    public static function createFromChoices($choice)
    {
        $scissors = Player::CHOICE_SCISSORS;
        $paper = Player::CHOICE_PAPER;
        $rock = Player::CHOICE_ROCK;
        $options = array($scissors, $paper, $rock);
        if (!in_array($choice, $options)) {
            throw new InvalidArgumentException;
        }

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
