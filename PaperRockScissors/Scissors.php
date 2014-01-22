<?php

namespace PaperRockScissors;

class Scissors implements IChoice
{
    public function winVersus(IChoice $choice)
    {
        return $choice instanceof Paper;
    }
}
