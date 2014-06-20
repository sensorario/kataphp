<?php

namespace Patterns\Factory\Kids;

use Patterns\Factory\Interfaces\FactoryKindBuilder;
use Patterns\Factory\Interfaces\KindKids;

class Dog implements KindKids
{
    public function verso()
    {
        return FactoryKindBuilder::BARK;
    }
}
