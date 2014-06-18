<?php

namespace EntityStateChange;

use Tests\EntityStateChange\StateMachinable;

class Entity implements StateMachinable
{
    const CREATED = 'created';
    const PENDING = 'pending';
    const WAITING = 'waiting';
    const CLOSED = 'closed';

    /**
     * @return array
     */
    public function statusList()
    {
        return [
            self::CREATED,
            self::PENDING,
            self::WAITING,
            self::CLOSED,
        ];
    }

    /**
     * @return integer
     */
    public function countStatuses()
    {
        return count($this->statusList());
    }
}
