<?php

namespace Tests\EntityStateChange;

use PHPUnit_Framework_TestCase;
use EntityStateChange\Entity;

class EntityStatusChangeTest extends PHPUnit_Framework_TestCase
{
    public function testStatusList()
    {
        $entity = new Entity();

        $statuses = [
            Entity::CREATED,
            Entity::PENDING,
            Entity::WAITING,
            Entity::CLOSED
        ];

        $this->assertEquals($statuses, $entity->statusList());
        $this->assertEquals(count($statuses), $entity->countStatuses());
    }

    public function testDefaultStatus()
    {
        $entity = new Entity();

        $this->assertEquals(Entity::CREATED, $entity->defaultState());
        $this->assertEquals(Entity::CREATED, $entity->status());
    }
}
