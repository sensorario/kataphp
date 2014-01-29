<?php

namespace Bowling\Implementation01;

use Bowling\Implementation01\PlayerMustLaunchTwoTimesException;
use Bowling\Implementation01\PlayerCanLaunchOneTimeException;

class Player
{
    private $points;
    private $turns;
    private $launchDone = 0;

    public function __construct()
    {
        $this->points = 0;
        $this->turns = array();
        $this->twoLaunchAvailable = false;
    }

    public function hasPoints()
    {
        $sumPoints = 0;

        for ($i = 0; $i < count($this->turns); $i++) {
            $currentLaunch = $this->turns[$i];
            $sumPoints += $currentLaunch;
        }

        return $sumPoints;
    }

    public function doStrike()
    {
        $countLaunch = count($this->turns);

        if ($countLaunch != 0) {
            throw new PlayerCanLaunchOneTimeException;
        }

        $this->turns[$countLaunch] = 10;
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
