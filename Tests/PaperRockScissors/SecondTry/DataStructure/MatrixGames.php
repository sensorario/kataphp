<?php

namespace Tests\PaperRockScissors\SecondTry\DataStructure;

use PaperRockScissors\SecondTry\DataStructure\PlayerChoice;

trait MatrixGames
{
    public function gamesMatrix()
    {
        return [
            [PlayerChoice::PAPER, PlayerChoice::SCISSORS, false],
            [PlayerChoice::PAPER, PlayerChoice::ROCK, true],
            [PlayerChoice::ROCK, PlayerChoice::PAPER, false],
            [PlayerChoice::ROCK, PlayerChoice::SCISSORS, true],
            [PlayerChoice::SCISSORS, PlayerChoice::PAPER, true],
            [PlayerChoice::SCISSORS, PlayerChoice::ROCK, false],
        ];
    }
}
