<?php

namespace PaperRockScissors\Implementation04;

abstract class PlayerBase
{
    protected $selection;

    public function __construct($selection)
    {
        $this->selection = $selection;
    }

    public function hasSelected()
    {
        return $this->selection;
    }

    public function winVersus(PlayerBase $playerBase)
    {
        return $this->selection == 'paper' && $playerBase->selection == 'rock'
        || $this->selection == 'rock' && $playerBase->selection == 'scissors'
        || $this->selection == 'scissors' && $playerBase->selection == 'paper';
    }
}
