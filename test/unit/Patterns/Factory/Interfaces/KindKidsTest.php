<?php

namespace Tests\Patterns\Factory\Interfaces;

use ReflectionClass;

class KindKidsTest extends \PHPUnit_Framework_TestCase
{
    public function testIsInterface()
    {
        $obj = new ReflectionClass('Patterns\Factory\Interfaces\KindKids');
        $this->assertTrue($obj->isInterface());
    }

    public function testHasMethodsDefinition()
    {
        $obj = new ReflectionClass('Patterns\Factory\Interfaces\KindKids');
        $this->assertTrue($obj->hasMethod('verse'));
    }
}
