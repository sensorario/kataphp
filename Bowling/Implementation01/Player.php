<?php

namespace Bowling\Implementation01;

class Player
{
    private $points;
    private $launch;
    private $lanciFatti = 0;

    public function __construct()
    {
        $this->points = 0;
        $this->launch = array();
    }

    public function hasPoints()
    {
        $sumPoints = 0;
        for ($i = 0; $i < count($this->launch); $i++) {
            $currentLaunch = $this->launch[$i];
            if ($i > 0) {
                $previousLaunch = $this->launch[$i - 1];
                $sumPoints += $currentLaunch + $previousLaunch;
            } else {
                $sumPoints += $currentLaunch;
            }
        }
        return $sumPoints;
    }

    public function doStrike()
    {
        $countLaunch = count($this->launch);
        $this->launch[$countLaunch] = 10;
    }

    public function doLaunch()
    {
        $this->lanciFatti++;
    }

    public function hasOneMoreLaunch()
    {
        return !($this->lanciFatti == 2);
    }
}
