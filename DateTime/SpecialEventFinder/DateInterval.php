<?php

namespace DateTime\SpecialEventFinder;

use DateTime;

class DateInterval
{
    /**
     * @var DateTime
     */
    private $dateFrom;

    /**
     * @var DateTime
     */
    private $dateTo;

    public function __construct()
    {
        $this->dateFrom = new DateTime("-1 days");
        $this->dateTo = new DateTime("+6 days");

        $this->dateFrom->setTime(0, 0, 0);
    }

    public function setDateFrom(DateTime $from)
    {
        $this->dateFrom = $from;
    }

    public function setDateTo(DateTime $to)
    {
        $this->dateTo = $to;
    }

    public function daysRangeLength()
    {
        return $this->dateTo->diff($this->dateFrom)->days;
    }

    public function getDateFrom()
    {
        return $this->dateFrom;
    }

    public function getDateTo()
    {
        return $this->dateTo;
    }

    public function contains(DateTime $dateTime)
    {
        if ($dateTime > $this->dateTo || $dateTime < $this->dateFrom) {
            return false;
        }

        return true;
    }
}
