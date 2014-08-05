<?php

namespace StateMachine\Implementation01\Interfaces;

interface EntityStatusFactory
{
    public static function getStatus($status);

    public static function getAvailableStatuses();
}
