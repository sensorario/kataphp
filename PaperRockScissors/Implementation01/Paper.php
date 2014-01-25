<?php

namespace PaperRockScissors\Implementation01;

class Paper implements Choice
{
    public function winVersus(Choice $choice)
    {
        return $choice instanceof Rock;
    }
}
