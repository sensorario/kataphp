<?php

namespace Tests\EntityStateChange;

interface StateMachinable
{
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
}
