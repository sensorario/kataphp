<?php

namespace PaperRockScissors;

class Scissors implements Choice
{
    public function winVersus(Choice $choice)
    {
        return $choice instanceof Paper;
    }
}
