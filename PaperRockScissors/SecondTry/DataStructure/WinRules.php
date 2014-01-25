<?php

namespace PaperRockScissors\SecondTry\DataStructure;

class WinRules
{
    public function with($tizioSelection, $caioSelection)
    {
        return $tizioSelection == PlayerChoice::PAPER && $caioSelection == PlayerChoice::ROCK
        || $tizioSelection == PlayerChoice::ROCK && $caioSelection == PlayerChoice::SCISSORS
        || $tizioSelection == PlayerChoice::SCISSORS && $caioSelection == PlayerChoice::PAPER;
    }
}
