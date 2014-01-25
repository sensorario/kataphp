<?php

namespace PaperRockScissors\Implementation04;

class ConcretePlayerRock extends PlayerBase
{
    public function __construct()
    {
        parent::__construct('rock');
    }
}
