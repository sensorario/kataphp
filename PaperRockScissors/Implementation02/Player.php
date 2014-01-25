<?php

namespace PaperRockScissors\Implementation02;

use PaperRockScissors\Implementation02\DataStructure\WinRules;

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
