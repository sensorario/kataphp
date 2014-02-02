<?php

namespace Bowling\Implementation01;

class Game
{
    private $frame;
    private $index;

    public function __construct()
    {
        $this->index = 0;
        $this->frame = [];
    }

    public function playFrame($shots)
    {
        $index = $this->index;
        $this->frame[$index] = $shots;
        $this->index++;
    }

    public function shots()
    {
        $shots = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        for ($i = 0; $i < $this->index; $i++) {
            $shots[$i] = $this->frame[$i];
        }
        return $shots;
    }

    public function points()
    {
        $points = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        for ($i = $this->index - 1; $i >= 0; $i--) {
            $points[$i] = $this->frame[$i][0] + $this->frame[$i][1];
            if ($i < $this->index - 1) {
                if (($this->frame[$i][0] + $this->frame[$i][1]) == 10) {
                    $points[$i] += $this->frame[$i][0] == 10 ?
                        $this->getNextShotPoints($i + 1) :
                        $this->frame[$i + 1][0];
                }
            }
        }
        return $points;
    }

    public function calculatePoints()
    {
        $points = $this->points();
        $sum = 0;
        foreach ($points as $point) {
            $sum += $point;
        }
        return $sum;
    }

    private function getNextShotPoints($i, $nextShotPoints = 0)
    {
        if (!empty($this->frame[$i][0])) {
            $nextShotPoints = $this->frame[$i][0] + $this->frame[$i][1];
            if ($nextShotPoints == 10 && $this->frame[$i][1] == 0) {
                if (!empty($this->frame[$i + 1])) {
                    $nextShotPoints += $this->frame[$i + 1][0] + $this->frame[$i + 1][1];
                }
            }
        }
        return $nextShotPoints;
    }
}
