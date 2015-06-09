<?php

namespace Tests\Patterns\Factory;

use Patterns\Factory\FactoryKindBuilder;
use Patterns\Factory\Interfaces\KindKids;
use PHPUnit_Framework_TestCase;

class FactoryKindBuilderTest extends PHPUnit_Framework_TestCase
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
            [FactoryKindBuilder::DOG, FactoryKindBuilder::PATTERNS_FACTORY_KIDS_DOG, FactoryKindBuilder::BARK],
            [FactoryKindBuilder::HORSE, FactoryKindBuilder::PATTERNS_FACTORY_KIDS_HORSE, FactoryKindBuilder::SOME_VERSE],
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
            [FactoryKindBuilder::DOG],
            [FactoryKindBuilder::HORSE],
        ];
    }
}
