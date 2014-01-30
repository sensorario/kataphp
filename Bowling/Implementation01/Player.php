<?php

namespace Bowling\Implementation01;

use Bowling\Implementation01\PlayerMustLaunchTwoTimesException;
use Bowling\Implementation01\PlayerCanLaunchOneTimeException;

class Player
{
    private $points;
    private $turns;
    private $launchDone = 0;
    private $birilliInPiedi = 0;

    public function __construct($name)
    {
        $this->points = 0;
        $this->turns = array();
        $this->twoLaunchAvailable = false;
        $this->name = $name;
        $this->birilliInPiedi = 10;
    }

    public function getName()
    {
        return $this->name;
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

        $this->birilliInPiedi = 0;

        $this->turns[$countLaunch] = 10;
    }

    public function doLaunch($birilli)
    {
        $this->birilliInPiedi -= $birilli;
        $this->launchDone += 1;
    }

    public function hasOneMoreLaunch()
    {
        return !($this->launchDone == 2) && $this->birilliInPiedi > 0;
    }

    public function leaveTurnToNextPlayer()
    {
        if ($this->launchDone <= 1 && $this->hasOneMoreLaunch()) {
            throw new PlayerMustLaunchTwoTimesException;
        }

        $this->twoLaunchAvailable = $this->birilliInPiedi > 0;
    }

    public function hasTwoLaunchAvailability()
    {
        return $this->twoLaunchAvailable;
    }

    public function canLeaveTurnToNextPlayer()
    {
        return !($this->hasOneMoreLaunch());
    }
}
