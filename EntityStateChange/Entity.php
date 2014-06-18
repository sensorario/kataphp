<?php

namespace EntityStateChange;

use Tests\EntityStateChange\StateMachinable;

class Entity implements StateMachinable
{
    const CREATED = 'created';
    const PENDING = 'pending';
    const WAITING = 'waiting';
    const CLOSED = 'closed';

    private $statuses = [
        self::CREATED,
        self::PENDING,
        self::WAITING,
        self::CLOSED,
    ];

    private $currentStatus = self::CREATED;

    /**
     * @return array
     */
    public function statusList()
    {
        return $this->statuses;
    }

    /**
     * @return integer
     */
    public function countStatuses()
    {
        return count($this->statuses);
    }

    /**
     * @return integer
     */
    public function defaultState()
    {
        return self::CREATED;
    }

    /**
     * @return string
     */
    public function status()
    {
        return $this->currentStatus;
    }

    /**
     * @return $this
     */
    public function becomeWaiting()
    {
        $this->currentStatus = self::WAITING;

        return $this;
    }
}
