<?php

namespace PaperRockScissors;

class Paper implements Choice
{
    public function winVersus(Choice $choice)
    {
        return $choice instanceof Rock;
    }
}
