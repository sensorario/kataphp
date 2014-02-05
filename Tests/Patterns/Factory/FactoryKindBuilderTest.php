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
            ['uno', 'Patterns\Factory\Kids\Uno'],
            ['due', 'Patterns\Factory\Kids\Due'],
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
            ['uno'],
            ['due'],
        ];
    }
}
