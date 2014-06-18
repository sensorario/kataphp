<?php

namespace EntityStateChange;

interface StateMachinable
{
    const CREATED = 'created';
    const PENDING = 'pending';
    const WAITING = 'waiting';
    const CLOSED = 'closed';

    /**
     * @return array
     */
    public function statusList();

    /**
     * @return integer
     */
    public function countStatuses();

    /**
     * @return integer
     */
    public function defaultState();

    /**
     * @return string
     */
    public function status();

    /**
     * @return $this
     */
    public function becomeWaiting();

    /**
     * @return $this
     */
    public function becomePending();

    /**
     * @return $this
     */
    public function close();
}
