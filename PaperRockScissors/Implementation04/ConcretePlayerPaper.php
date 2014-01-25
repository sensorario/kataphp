<?php

namespace PaperRockScissors\Implementation04;

class ConcretePlayerPaper extends PlayerBase
{
    public function __construct()
    {
        parent::__construct('paper');
    }
}
