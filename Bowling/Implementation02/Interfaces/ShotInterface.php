<?php

namespace Bowling\Implementation02\Interfaces;

interface ShotInterface
{
    const TOTAL_BILLS = 10;

    public function billsKilled($billsKilled);

    public function getNumberOfBillsBilled();

    public function billsNotKilled();
}
