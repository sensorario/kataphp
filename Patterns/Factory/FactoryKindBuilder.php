<?php

namespace Patterns\Factory;

use Patterns\Factory\Kids\Due;
use Patterns\Factory\Kids\Uno;

class FactoryKindBuilder
{
    public static function build($dataSet)
    {
        switch ($dataSet) {
            case 'uno':
                return new Uno();
            case 'due':
                return new Due();
        }
    }
}
