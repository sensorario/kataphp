<?php

namespace Bowling\Implementation02;

use Bowling\Implementation02\Exceptions\AlreadyPerformedException;
use Bowling\Implementation02\Exceptions\AnyShotsPerformedException;
use Bowling\Implementation02\Interfaces\ShotInterface;

class Shot implements ShotInterface
{
    private $shotIsPerformed = false;

    private $billsKilled = null;

    public function getNumberOfBillsBilled()
    {
        if (!$this->shotIsPerformed) {
            throw new AnyShotsPerformedException();
        }

        return $this->billsKilled;
    }

    public function billsKilled($billsKilled)
    {
        if ($this->shotIsPerformed) {
            throw new AlreadyPerformedException();
        }

        $this->shotIsPerformed = true;

        $this->billsKilled = $billsKilled;

        return $this;
    }

    public function billsNotKilled()
    {
        return self::TOTAL_BILLS - $this->billsKilled;
    }
}
