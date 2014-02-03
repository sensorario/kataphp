<?php

namespace PaperRockScissors\Implementation02\DataStructure;

class WinRules
{
    public static function with($tizioSelection, $caioSelection)
    {
        return $tizioSelection == PlayerChoice::PAPER && $caioSelection == PlayerChoice::ROCK
        || $tizioSelection == PlayerChoice::ROCK && $caioSelection == PlayerChoice::SCISSORS
        || $tizioSelection == PlayerChoice::SCISSORS && $caioSelection == PlayerChoice::PAPER;
    }
}
