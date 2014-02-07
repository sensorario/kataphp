<?php

namespace Tests\Patterns\Factory;

use Patterns\Factory\FactoryKindBuilder;
use Patterns\Factory\Interfaces\KindKids;

class FactoryKindBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider kidsClass
     */
    public function testBuilder($name, $className)
    {
        $generatedClass = FactoryKindBuilder::build($name);
        $this->assertTrue(get_class($generatedClass) === $className);
    }

    public function kidsClass()
    {
        return [
            ['dog', 'Patterns\Factory\Kids\Dog'],
            ['horse', 'Patterns\Factory\Kids\Horse'],
        ];
    }

    /**
     * @dataProvider kidsClassMethods
     */
    public function testBuilderMethods($name, $methodWillReturn)
    {
        $generatedClass = FactoryKindBuilder::build($name);
        $this->assertTrue($generatedClass->verse() === $methodWillReturn);
    }

    public function kidsClassMethods()
    {
        return [
            ['dog', 'abbaia'],
            ['horse', 'nitrisce'],
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
