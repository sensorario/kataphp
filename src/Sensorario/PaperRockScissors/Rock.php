<?php
namespace Sensorario\PaperRockScissors;

final class Rock implements Choice
{
    public function winVersus(Choice $choise)
    {
        return $choise == new Scissors();
    }
}
