<?php

namespace Patterns\Factory\Kids;

use Patterns\Factory\Interfaces\KindKids;

class Due implements KindKids
{
    public function fischia()
    {
        return 'melone';
    }
}
