<?php

namespace PaperRockScissors\Implementation01;

class Scissors implements Choice
{
    public function winVersus(Choice $choice)
    {
        return $choice instanceof Paper;
    }
}
