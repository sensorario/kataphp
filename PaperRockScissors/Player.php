<?php

namespace PaperRockScissors;

class Player
{
    private $choice;

    public function __construct(IChoice $choice)
    {
        $this->choice = $choice;
    }

    /**
     * @return IChoice
     */
    public function getChoice()
    {
        return $this->choice;
    }
}
