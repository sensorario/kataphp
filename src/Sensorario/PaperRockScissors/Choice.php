<?php
namespace Sensorario\PaperRockScissors;

interface Choice
{
    public function winVersus(Choice $choice);
}

