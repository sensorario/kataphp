<?php

namespace PaperRockScissors\Implementation01;

class Player
{
    private $choice;

    public function __construct(Choice $choice)
    {
        $this->choice = $choice;
    }

    /**
     * @return Choice
     */
    public function getChoice()
    {
        return $this->choice;
    }
}