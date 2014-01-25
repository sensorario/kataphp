<?php

namespace PaperRockScissors\Implementation01;

class Rock implements Choice
{
    public function winVersus(Choice $choice)
    {
        return $choice instanceof Scissors;
    }
}
