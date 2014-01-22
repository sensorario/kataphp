<?php

namespace PaperRockScissors;

class Rock implements IChoice
{
    public function winVersus(IChoice $choice)
    {
        return $choice instanceof Scissors;
    }
}
