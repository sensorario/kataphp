<?php

namespace PaperRockScissorsTwo;

use PaperRockScissorsTwo\DataStructure\WinsRule;

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
        return WinsRule::with($this->selection, $caio->hasSelected());
    }
}
