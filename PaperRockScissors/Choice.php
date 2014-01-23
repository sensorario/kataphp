<?php

namespace PaperRockScissors;

interface Choice
{
    public function winVersus(Choice $choice);
}
