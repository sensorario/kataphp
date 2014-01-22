<?php

namespace PaperRockScissors;

class Player
{
    public function __construct(IChoice $paper)
    {
        if (!($paper instanceof IChoice)) {
            throw new \Exception();
        }
    }
}
