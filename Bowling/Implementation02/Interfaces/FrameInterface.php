<?php

namespace Bowling\Implementation02\Interfaces;

interface FrameInterface
{
    /**
     * @param ShotInterface $shot
     *
     * @return $this
     */
    public function setFirstShot(ShotInterface $shot);

    /**
     * @return Shot
     */
    public function getFirstShot();

    /**
     * @param ShotInterface $shotInterface
     *
     * @return $this
     */
    public function setSecondShot(ShotInterface $shotInterface);

    /**
     * @return Shot
     */
    public function getSecondShot();

    /**
     * @param ShotInterface $shotInterface
     *
     * @return $this
     */
    public function runShot(ShotInterface $shotInterface);

    /**
     * @return int
     */
    public function getBillsKilledInFrame();

    /**
     * @return bool
     */
    public function isStrike();

    /**
     * @return bool
     */
    public function isSpare();
}
