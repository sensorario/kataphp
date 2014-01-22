<?php

namespace PaperRockScissors;

class Paper implements IChoice
{
    public function winVersus(IChoice $choice)
    {
        return $choice instanceof Rock;
    }
}
