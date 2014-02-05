<?php

namespace Patterns\Factory\Kids;

use Patterns\Factory\Interfaces\KindKids;

class Uno implements KindKids
{
    public function fischia()
    {
        return 'cocomero';
    }
}
