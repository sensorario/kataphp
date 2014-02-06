<?php

namespace Tests\Patterns\Factory;

use Patterns\Factory\FactoryKindBuilder;
use Patterns\Factory\Interfaces\KindKids;

class FactoryKindBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider kidsClass
     */
    public function testBuilder($name, $className, $methodWillReturn)
    {
        $generatedClass = FactoryKindBuilder::build($name);
        $this->assertTrue(get_class($generatedClass) === $className);
        $this->assertTrue($generatedClass->verso() === $methodWillReturn);
    }

    public function kidsClass()
    {
        return [
            ['dog', 'Patterns\Factory\Kids\Dog', 'abbaia'],
            ['horse', 'Patterns\Factory\Kids\Horse', 'nitrisce'],
        ];
    }

    /**
     * @dataProvider kidsImplements
     */
    public function testKindOf($name)
    {
        $generatedClass = FactoryKindBuilder::build($name);
        $this->assertTrue($generatedClass instanceof KindKids);
    }

    public function kidsImplements()
    {
        return [
            ['dog'],
            ['horse'],
        ];
    }
}
