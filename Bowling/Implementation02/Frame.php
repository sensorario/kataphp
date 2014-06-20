<?php

namespace Bowling\Implementation02;

use Bowling\Implementation02\Exceptions\OnlyTwoShotsAvailableException;
use Bowling\Implementation02\Exceptions\TooManyShotsException;
use Bowling\Implementation02\Interfaces\FrameInterface;
use Bowling\Implementation02\Interfaces\ShotInterface;

class Frame implements FrameInterface
{
    private $shots;

    /**
     * @param ShotInterface $shot
     * @deprecated
     * @return $this
     */
    public function setFirstShot(ShotInterface $shot)
    {
        $this->runShot($shot);

        return $this;
    }

    /**
     * @return Shot
     */
    public function getFirstShot()
    {
        return $this->shots[0];
    }

    /**
     * @param ShotInterface $shot
     * @deprecated
     * @return $this
     */
    public function setSecondShot(ShotInterface $shot)
    {
        $this->runShot($shot);

        return $this;
    }

    /**
     * @return Shot
     */
    public function getSecondShot()
    {
        return $this->shots[1];
    }

    /**
     * @param ShotInterface $shotInterface
     * @return $this
     * @throws Exceptions\OnlyTwoShotsAvailableException
     * @throws Exceptions\TooManyShotsException
     */
    public function runShot(ShotInterface $shotInterface)
    {
        if (count($this->shots) == 1) {
            if ($this->isStrike()) {
                throw new TooManyShotsException();
            }
        }

        if (count($this->shots) == 2) {
            throw new OnlyTwoShotsAvailableException();
        }

        $this->shots[] = $shotInterface;

        return $this;
    }

    /**
     * @return int
     */
    public function getBillsKilledInFrame()
    {
        $killsInFirstShot = $this->shots[0]
            ->getNumberOfBillsBilled();

        if ($this->isStrike()) {
            return $killsInFirstShot;
        }

        $killsInSecondShot = $this->shots[1]
            ->getNumberOfBillsBilled();

        return $killsInFirstShot + $killsInSecondShot;
    }

    /**
     * @return bool
     */
    public function isStrike()
    {
        return $this->getFirstShot()->getNumberOfBillsBilled() == 10;
    }

    /**
     * @return bool
     */
    public function isSpare()
    {
        return $this->getBillsKilledInFrame() == 10
        && $this->getSecondShot()->getNumberOfBillsBilled() > 0;
    }
}
