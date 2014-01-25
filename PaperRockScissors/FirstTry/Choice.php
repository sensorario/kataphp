<?php

namespace PaperRockScissors\FirstTry;

interface Choice
{
    public function winVersus(Choice $choice);
}
