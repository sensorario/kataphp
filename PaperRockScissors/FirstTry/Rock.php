<?php

namespace PaperRockScissors\FirstTry;

class Rock implements Choice
{
    public function winVersus(Choice $choice)
    {
        return $choice instanceof Scissors;
    }
}