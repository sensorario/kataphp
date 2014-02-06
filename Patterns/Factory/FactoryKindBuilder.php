<?php

namespace Patterns\Factory;

use Patterns\Factory\Kids\Dog;
use Patterns\Factory\Kids\Horse;

class FactoryKindBuilder
{
    public static function build($dataSet)
    {
        switch ($dataSet) {
            case 'horse':
                return new Horse();
            case 'dog':
                return new Dog();
        }
    }
}
