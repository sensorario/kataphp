<?php

namespace Patterns\Factory;

use Patterns\Factory\Childrens\Due;
use Patterns\Factory\Childrens\Uno;

class FactoryBuilder
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
