<?php
namespace Sensorario\PaperRockScissors;

final class Paper implements Choice
{
    public function winVersus(Choice $choise)
    {
        return $choise == new Rock();
    }
}
