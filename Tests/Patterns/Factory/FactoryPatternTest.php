<?php

namespace Tests\Patterns\Factory;

use Patterns\Factory\Childrens\Uno;
use Patterns\Factory\Childrens\Due;
use Patterns\Factory\FactoryBuilder;

class FactoryPatternTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider childrens
     */
    public function testBuilder($name, $className)
    {
        $generatedClass = FactoryBuilder::build($name);
        $this->assertTrue(get_class($generatedClass) === $className);
    }

    public function childrens()
    {
        return [
            ['uno', 'Patterns\Factory\Childrens\Uno'],
            ['due', 'Patterns\Factory\Childrens\Due'],
        ];
    }
}
