<?php

namespace Tests\StateMachine\Implementation01;

use Exception;
use PHPUnit_Framework_TestCase;
use ReflectionClass;
use StateMachine\Implementation01\Exceptions\InvalidStatusException;
use StateMachine\Implementation01\Interfaces\EntityStatusFactory as EntityStatusFactoryBase;
use StateMachine\Implementation01\Interfaces\StateA;
use StateMachine\Implementation01\Interfaces\StateB;
use StateMachine\Implementation01\Interfaces\StatusesConst;

class EntityA implements StateA
{
    public function methodA()
    {
        // TODO: Implement methodA() method.
    }
}

class EntityB implements StateB
{
    public function methodBOne()
    {
        // TODO: Implement methodBOne() method.
    }

    public function methodBTwo()
    {
        // TODO: Implement methodBTwo() method.
    }
}

class EntityStatusFactory implements EntityStatusFactoryBase
{
    public static function getStatus($status)
    {
        if (!in_array($status, self::getAvailableStatuses()))
            throw new InvalidStatusException();

        return new $status();
    }

    public static function getAvailableStatuses()
    {
        return [
            StatusesConst::STATUS_A,
            StatusesConst::STATUS_B
        ];
    }
}

class StateMachineTest extends PHPUnit_Framework_TestCase
{
    public function testAvailableStatuses()
    {
        $this->assertEquals([
            StatusesConst::STATUS_A,
            StatusesConst::STATUS_B
        ], EntityStatusFactory::getAvailableStatuses());
    }

    /**
     * @dataProvider statuses
     */
    public function testSomething($status, $methods)
    {
        $obj = EntityStatusFactory::getStatus($status);
        $this->assertTrue($obj instanceof StatusesConst);

        $reflectionClass = new ReflectionClass($obj);
        $this->assertEquals(count($reflectionClass->getMethods()), count($methods));
        foreach ($reflectionClass->getMethods() as $method) {
            $this->assertTrue(in_array($method->getName(), $methods));
        }
    }

    public function statuses()
    {
        return [
            [StatusesConst::STATUS_A, ['methodA']],
            [StatusesConst::STATUS_B, ['methodBOne', 'methodBTwo']]
        ];
    }

    /**
     * @expectedException StateMachine\Implementation01\Exceptions\InvalidStatusException
     */
    public function testException()
    {
        $aStatus = 'hello';
        $this->assertTrue(!in_array($aStatus, EntityStatusFactory::getAvailableStatuses()));
        EntityStatusFactory::getStatus($aStatus);
    }
}
