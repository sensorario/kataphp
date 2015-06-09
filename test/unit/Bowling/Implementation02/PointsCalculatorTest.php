<?php

namespace Tests\Bowling\Implementation02;

use Bowling\Implementation02\Frame;
use Bowling\Implementation02\PointsCalculator;
use Bowling\Implementation02\Shot;
use PHPUnit_Framework_TestCase;

class PointsCalculatorTest extends PHPUnit_Framework_TestCase
{
    public function testFrameCount()
    {
        $pointsCalculator = new PointsCalculator();

        $this->assertSame(0, $pointsCalculator->countFrames());
    }

    public function testAddingOneFrame()
    {
        $pointsCalculator = (new PointsCalculator());
        $frame = (new Frame())
            ->runShot((new Shot())->billsKilled(3))
            ->runShot((new Shot())->billsKilled(4));
        $pointsCalculator->addFrame($frame);

        $this->assertSame(1, $pointsCalculator->countFrames());
        $this->assertSame(7, $pointsCalculator->countPoints());
    }

    public function testAddingTwoFrame()
    {
        $pointsCalculator = (new PointsCalculator());

        $frame = (new Frame())
            ->runShot((new Shot())->billsKilled(3))
            ->runShot((new Shot())->billsKilled(4));
        $pointsCalculator->addFrame($frame);

        $frameTwo = (new Frame())
            ->runShot((new Shot())->billsKilled(5))
            ->runShot((new Shot())->billsKilled(4));
        $pointsCalculator->addFrame($frameTwo);

        $this->assertSame(2, $pointsCalculator->countFrames());
        $this->assertSame(16, $pointsCalculator->countPoints());
    }

    public function testAddingTwoFrameWishSpare()
    {
        $pointsCalculator = (new PointsCalculator());

        $frame = (new Frame())
            ->runShot((new Shot())->billsKilled(6))
            ->runShot((new Shot())->billsKilled(4));
        $pointsCalculator->addFrame($frame);

        $frameTwo = (new Frame())
            ->runShot((new Shot())->billsKilled(7))
            ->runShot((new Shot())->billsKilled(1));
        $pointsCalculator->addFrame($frameTwo);

        $this->assertSame(2, $pointsCalculator->countFrames());
        $this->assertSame(25, $pointsCalculator->countPoints());
    }

    public function testAddingTwoFrameWishStrike()
    {
        $pointsCalculator = (new PointsCalculator());

        $frame = (new Frame())
            ->runShot((new Shot())->billsKilled(10));
        $pointsCalculator->addFrame($frame);

        $frameTwo = (new Frame())
            ->runShot((new Shot())->billsKilled(7))
            ->runShot((new Shot())->billsKilled(1));
        $pointsCalculator->addFrame($frameTwo);

        $this->assertSame(2, $pointsCalculator->countFrames());
        $this->assertSame(26, $pointsCalculator->countPoints());
    }

    public function testAddingThreeStrike()
    {
        $pointsCalculator = (new PointsCalculator())
            ->addFrame(
                (new Frame())
                    ->runShot((new Shot())->billsKilled(10))
            )
            ->addFrame(
                (new Frame())
                    ->runShot((new Shot())->billsKilled(10))
            )
            ->addFrame(
                (new Frame())
                    ->runShot((new Shot())->billsKilled(10))
            );

        $this->assertSame(3, $pointsCalculator->countFrames());
        $this->assertSame(60, $pointsCalculator->countPoints());
    }

    public function testAddingFourStrike()
    {
        $pointsCalculator = (new PointsCalculator())
            ->addFrame(
                (new Frame())
                    ->runShot((new Shot())->billsKilled(10))
            )
            ->addFrame(
                (new Frame())
                    ->runShot((new Shot())->billsKilled(10))
            )
            ->addFrame(
                (new Frame())
                    ->runShot((new Shot())->billsKilled(10))
            )
            ->addFrame(
                (new Frame())
                    ->runShot((new Shot())->billsKilled(10))
            );

        $this->assertSame(4, $pointsCalculator->countFrames());
        $this->assertSame(90, $pointsCalculator->countPoints());
    }

    public function testAllStrikesMeansExtraFrame()
    {
        $pointsCalculator = (new PointsCalculator());

        for ($i = 0; $i < 10; $i++) {
            $this->assertSame(false, $pointsCalculator->extraFrameAvailable());
            $pointsCalculator->addFrame(
                (new Frame())
                    ->runShot((new Shot())->billsKilled(10))
            );
        }

        $this->assertSame(true, $pointsCalculator->extraFrameAvailable());
    }
}
