<?php

namespace PaperRockScissors\Implementation04;

class ConcretePlayerScissors extends PlayerBase
{
    public function __construct()
    {
        parent::__construct('scissors');
    }
}
