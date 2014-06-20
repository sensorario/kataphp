<?php

namespace Bowling\Implementation02\Interfaces;

use Bowling\Implementation02\Frame;

interface PointsCalculatorInterface
{
    public function countFrames();

    public function addFrame(Frame $frame);

    public function countPoints();

    public function extraFrameAvailable();
}
