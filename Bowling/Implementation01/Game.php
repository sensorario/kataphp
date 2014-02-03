<?php

namespace Bowling\Implementation01;

class Game
{
    private $frames;
    private $index;

    public function __construct()
    {
        $this->index = 0;
        $this->frames = [];
    }

    public function playFrame($shots)
    {
        $this->frames[$this->index++] = $shots;
    }

    public function getShots()
    {
        $shots = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        for ($i = 0; $i < $this->index; $i++) {
            $shots[$i] = $this->frames[$i];
        }
        return $shots;
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

    public function points()
    {
        $points = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        for ($i = $this->index - 1; $i >= 0; $i--) {
            $points[$i] = $this->frames[$i][0] + $this->frames[$i][1];
            if ($i < $this->index - 1) {
                if (($this->frames[$i][0] + $this->frames[$i][1]) == 10) {
                    $isStrike = $this->frames[$i][0] == 10;
                    $points[$i] += $isStrike ?
                        $this->sumNextShotPoints($i + 1) :
                        $this->frames[$i + 1][0];
                }
            }
        }
        return $points;
    }

    private function sumNextShotPoints($i, $nextShotPoints = 0)
    {
        if (!empty($this->frames[$i][0])) {
            $nextShotPoints = $this->frames[$i][0] + $this->frames[$i][1];
            if ($nextShotPoints == 10 && $this->frames[$i][1] == 0) {
                if (!empty($this->frames[$i + 1])) {
                    $nextShotPoints += $this->frames[$i + 1][0] + $this->frames[$i + 1][1];
                }
            }
        }
        return $nextShotPoints;
    }
}
