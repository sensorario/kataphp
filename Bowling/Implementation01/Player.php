<?php

namespace Bowling\Implementation01;

use Bowling\Implementation01\PlayerMustLaunchTwoTimesException;

class Player
{
    private $points;
    private $launch;
    private $launchDone = 0;

    public function __construct()
    {
        $this->points = 0;
        $this->launch = array();
        $this->twoLaunchAvailable = false;
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
        $this->launchDone += 1;
    }

    public function hasOneMoreLaunch()
    {
        return !($this->launchDone == 2);
    }

    public function leaveTurnToNextPlayer()
    {
        if ($this->launchDone == 1) {
            throw new PlayerMustLaunchTwoTimesException;
        }

        $this->twoLaunchAvailable = true;
    }

    public function hasTwoLaunchAvailability()
    {
        return $this->twoLaunchAvailable;
    }
}
