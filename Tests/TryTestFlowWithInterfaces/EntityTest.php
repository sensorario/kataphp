<?php

namespace Tests\TryTestFlowWithInterfaces;

use PHPUnit_Framework_TestCase;
use TryTestFlowWithInterfaces\Entity;

class EntityTest extends PHPUnit_Framework_TestCase
{
    public function testEntityMethod()
    {
        $quantity = (new Entity())
            ->countFour();

        $this->assertEquals(4, $quantity);
    }
}
