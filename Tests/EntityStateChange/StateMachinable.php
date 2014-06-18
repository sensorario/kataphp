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
}