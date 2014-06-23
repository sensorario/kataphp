<?php

namespace Patterns\Factory\Kids;

use Patterns\Factory\Interfaces\FactoryKindBuilder;
use Patterns\Factory\Interfaces\KindKids;

class Horse implements KindKids
{
    public function verse()
    {
        return FactoryKindBuilder::SOME_VERSE;
    }
}
