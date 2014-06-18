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

    public function testStatusChangeAndDefaultStatusWontChange()
    {
        $entity = (new Entity())
            ->becomeWaiting();
        $this->assertEquals(Entity::WAITING, $entity->status());
        $this->assertEquals(Entity::CREATED, $entity->defaultState());
    }

    public function testEntityCanBeClosed()
    {
        $entity = (new Entity())
            ->close();
        $this->assertEquals(Entity::CLOSED, $entity->status());
    }

    public function testEntityCanBePending()
    {
        $entity = (new Entity())
            ->becomePending();
        $this->assertEquals(Entity::PENDING, $entity->status());
    }
}
