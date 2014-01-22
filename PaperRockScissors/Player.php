<?php

namespace PaperRockScissors;

class Player
{
    private $choice;

    public function __construct(IChoice $paper)
    {
        $this->choice = $paper;
    }

    public function getChoice()
    {
        return $this->choice;
    }
}
