<?php

namespace Patterns\Factory;

use Patterns\Factory\Childrens\Due;
use Patterns\Factory\Childrens\Uno;

class FactoryBuilder
{
    public static function build($dataSet)
    {
        if ($dataSet == 'uno') {
            return new Uno();
        }
        if ($dataSet == 'due') {
            return new Due();
        }
    }
}
