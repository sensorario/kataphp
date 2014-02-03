<?php

namespace Tests\Bowling\Implementation01;

use PHPUnit_Framework_TestCase;
use Bowling\Implementation01\Player;

class BowlingTest extends PHPUnit_Framework_TestCase
{
    public function testGameAfterFourStrike()
    {
        $game = new Player();
        for ($i = 0; $i <= 3; $i++) {
            $game->playFrame([10, 0]);
        }
        $this->assertTrue($game->points() === [30, 30, 20, 10, 0, 0, 0, 0, 0, 0, 0]);
    }

    public function testGamePointsAfterAllStrike()
    {
        $game = new Player();
        for ($i = 0; $i <= 10; $i++) {
            $game->playFrame([10, 0]);
        }
        $this->assertTrue($game->calculatePoints() === 300);
    }

    /**
     * @dataProvider shotsAndShots
     */
    public function testGameMuddle($shots, $allShots)
    {
        $game = new Player();
        foreach ($shots as $shot) {
            $game->playFrame($shot);
        }
        $this->assertTrue($game->getShots() === $allShots);
    }

    public function shotsAndShots()
    {
        return [
            [[[10, 0]], [[10, 0], 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],],
            [[[10, 0], [10, 0]], [[10, 0], [10, 0], 0, 0, 0, 0, 0, 0, 0, 0, 0],],
            [[[10, 0], [10, 0], [10, 0]], [[10, 0], [10, 0], [10, 0], 0, 0, 0, 0, 0, 0, 0, 0],],
            [[[10, 0], [10, 0], [10, 0], [2, 3]], [[10, 0], [10, 0], [10, 0], [2, 3], 0, 0, 0, 0, 0, 0, 0],],
            [[[10, 0], [10, 0], [10, 0], [2, 3], [0, 10]], [[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], 0, 0, 0, 0, 0, 0],],
            [[[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10]], [[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10], 0, 0, 0, 0, 0],],
            [[[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10], [3, 7]], [[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10], [3, 7], 0, 0, 0, 0],],
            [[[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10], [3, 7], [7, 3]], [[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10], [3, 7], [7, 3], 0, 0, 0],],
        ];
    }

    /**
     * @dataProvider shotsAndPoints
     */
    public function testPoints($shots, $score)
    {
        $game = new Player();
        foreach ($shots as $shot) {
            $game->playFrame($shot);
        }
        $this->assertTrue($game->points() === $score);
    }

    public function shotsAndPoints()
    {
        return [
            [[[10, 0]], [10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],],
            [[[10, 0], [10, 0]], [20, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0],],
            [[[10, 0], [10, 0], [10, 0]], [30, 20, 10, 0, 0, 0, 0, 0, 0, 0, 0],],
            [[[10, 0], [10, 0], [10, 0], [2, 3]], [30, 25, 15, 5, 0, 0, 0, 0, 0, 0, 0],],
            [[[10, 0], [10, 0], [10, 0], [2, 3], [0, 10]], [30, 25, 15, 5, 10, 0, 0, 0, 0, 0, 0],],
            [[[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10]], [30, 25, 15, 5, 10, 10, 0, 0, 0, 0, 0],],
            [[[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10], [3, 7]], [30, 25, 15, 5, 10, 13, 10, 0, 0, 0, 0],],
            [
                [[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10], [3, 7], [7, 3]],
                [30, 25, 15, 5, 10, 13, 17, 10, 0, 0, 0],
            ],
        ];
    }

    /**
     * @dataProvider shotsAndScores
     */
    public function testScore($shots, $score)
    {
        $game = new Player();
        foreach ($shots as $shot) {
            $game->playFrame($shot);
        }
        $this->assertTrue($game->calculatePoints() === $score);
    }

    public function shotsAndScores()
    {
        return [
            [[[10, 0]], 10,],
            [[[10, 0], [10, 0]], 30,],
            [[[10, 0], [10, 0], [10, 0]], 60,],
            [[[10, 0], [10, 0], [10, 0], [2, 3]], 75,],
            [[[10, 0], [10, 0], [10, 0], [2, 3], [0, 10]], 85,],
            [[[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10]], 95,],
            [[[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10], [3, 7]], 108,],
            [[[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10], [3, 7], [7, 3]], 125,],
        ];
    }
}
