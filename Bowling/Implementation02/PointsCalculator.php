<?php

namespace Bowling\Implementation02;

use Bowling\Implementation02\Interfaces\PointsCalculatorInterface;

class PointsCalculator implements PointsCalculatorInterface
{
    private $frames = [];

    public function countFrames()
    {
        return count($this->frames);
    }

    public function addFrame(Frame $frame)
    {
        $this->frames[] = $frame;

        return $this;
    }

    public function countPoints()
    {
        $points = 0;

        $countFrames = $this->countFrames();
        $frames = $this->frames;

        /** @var Frame $frame */
        while ($countFrames-- > 0) {
            /** @var Frame $frame */
            $frame = $frames[$countFrames];
            $points += $frame->getBillsKilledInFrame();

            if ($frame->isStrike()) {
                $points += $this->getNextFramePoints($frames, $countFrames);
            } elseif ($frame->isSpare()) {
                $points += $this->getNextFrameFirstShotPoints($frames, $countFrames);
            }
        }

        return $points;
    }

    /**
     * @param $frames
     * @param $countFrames
     * @param bool $stop
     * @return int
     */
    private function getNextFramePoints($frames, $countFrames, $stop = false)
    {
        if (!isset($frames[$countFrames + 1])) {
            return 0;
        }

        $frame = $frames[$countFrames + 1];

        if ($stop || !isset($frames[$countFrames + 2])) {
            return $frame->getBillsKilledInFrame();
        }

        return $this->getNextFramePoints($frames, $countFrames + 1, true) + $frame->getBillsKilledInFrame();
    }

    /**
     * @param $frames
     * @param $countFrames
     * @return array
     */
    private function getNextFrameFirstShotPoints($frames, $countFrames)
    {
        if (!isset($frames[$countFrames + 1])) {
            return 0;
        }

        $frame = $frames[$countFrames + 1];
        $shot = $frame->getFirstShot();
        return $shot->getNumberOfBillsBilled();
    }

    public function extraFrameAvailable()
    {
        if (!isset($this->frames[9])) {
            return false;
        }

        /** @var Frame $frame */
        $frame = $this->frames[9];
        return $frame->isStrike();
    }
}
