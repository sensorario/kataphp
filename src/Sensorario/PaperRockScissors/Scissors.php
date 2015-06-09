<?php
namespace Sensorario\PaperRockScissors;

final class Scissors implements Choice
{
    public function winVersus(Choice $choise)
    {
        return $choise == new Paper();
    }
}
