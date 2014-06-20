<?php

namespace Patterns\Factory;

use Patterns\Factory\Interfaces\FactoryKindBuilder as FactoryKindBuilderBaseInterface;
use Patterns\Factory\Kids\Dog;
use Patterns\Factory\Kids\Horse;

class FactoryKindBuilder implements FactoryKindBuilderBaseInterface
{
    public static function build($animal)
    {
        switch ($animal) {
            case self::HORSE:
                return new Horse();
            case self::DOG:
                return new Dog();
        }
    }
}
