<?php

namespace PaperRockScissors\SecondTry;

use PaperRockScissors\SecondTry\DataStructure\WinRules;

class Player
{
    private $selection;

    public function select($selection)
    {
        $this->selection = $selection;
    }

    public function hasSelected()
    {
        return $this->selection;
    }

    public function winVersus(Player $caio)
    {
        return WinRules::with($this->selection, $caio->selection);
    }
}
