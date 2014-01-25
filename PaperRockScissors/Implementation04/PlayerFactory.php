<?php

namespace PaperRockScissors\Implementation04;

class PlayerFactory
{
    private $selection;

    private function __construct($selection)
    {
        $this->selection = $selection;
    }

    public static function builder($type)
    {
        switch ($type) {
            case 'paper':
                return new ConcretePlayerPaper();
                break;
            case 'rock':
                return new ConcretePlayerRock();
                break;
            case 'scissors':
                return new ConcretePlayerScissors();
                break;
        }
    }
}
