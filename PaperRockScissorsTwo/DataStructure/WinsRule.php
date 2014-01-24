<?php

namespace PaperRockScissorsTwo\DataStructure;

class WinsRule
{
    public static function with($tizioChoice, $caioChoice)
    {
        $wins = [
            PlayerChoice::PAPER . PlayerChoice::ROCK,
            PlayerChoice::ROCK . PlayerChoice::SCISSORS,
            PlayerChoice::SCISSORS . PlayerChoice::PAPER
        ];

        return in_array(
            $tizioChoice . $caioChoice,
            $wins
        );
    }
}
