<?php

namespace Tests\Bowling\Implementation01;

use PHPUnit_Framework_TestCase;
use Bowling\Implementation01\Player;

class PlayerTest extends PHPUnit_Framework_TestCase
{
    public function testPlayerScoresAfterFourStrike()
    {
        $player = new Player();
        for ($i = 0; $i <= 3; $i++) {
            $player->playFrame([10, 0]);
        }
        $this->assertTrue($player->points() === [30, 30, 20, 10, 0, 0, 0, 0, 0, 0, 0]);
    }

    public function testPlayerScoresAfterAllStrike()
    {
        $player = new Player();
        for ($i = 0; $i <= 10; $i++) {
            $player->playFrame([10, 0]);
        }
        $this->assertTrue($player->score() === 300);
    }

    /**
     * @dataProvider shotsAndShots
     */
    public function testPlayerShotsArray($shots, $allShots)
    {
        $player = new Player();
        foreach ($shots as $shot) {
            $player->playFrame($shot);
        }
        $this->assertTrue($player->getShots() === $allShots);
    }

    public function shotsAndShots()
    {
        return [
            [[[10, 0]], [[10, 0], 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],],
            [[[10, 0], [10, 0]], [[10, 0], [10, 0], 0, 0, 0, 0, 0, 0, 0, 0, 0],],
            [[[10, 0], [10, 0], [10, 0]], [[10, 0], [10, 0], [10, 0], 0, 0, 0, 0, 0, 0, 0, 0],],
            [[[10, 0], [10, 0], [10, 0], [2, 3]], [[10, 0], [10, 0], [10, 0], [2, 3], 0, 0, 0, 0, 0, 0, 0],],
            [
                [[10, 0], [10, 0], [10, 0], [2, 3], [0, 10]],
                [[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], 0, 0, 0, 0, 0, 0],
            ],
            [
                [[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10]],
                [[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10], 0, 0, 0, 0, 0],
            ],
            [
                [[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10], [3, 7]],
                [[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10], [3, 7], 0, 0, 0, 0],
            ],
            [
                [[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10], [3, 7], [7, 3]],
                [[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10], [3, 7], [7, 3], 0, 0, 0],
            ],
        ];
    }

    /**
     * @dataProvider shotsAndPoints
     */
    public function testPlayerScoreFramesArray($shots, $score)
    {
        $player = new Player();
        foreach ($shots as $shot) {
            $player->playFrame($shot);
        }
        $this->assertTrue($player->points() === $score);
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
        $player = new Player();
        foreach ($shots as $shot) {
            $player->playFrame($shot);
        }
        $this->assertTrue($player->score() === $score);
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

    public function testSomethig()
    {
        $player = new Player();
        $player->playFrame([2, 5]);
        $this->assertEquals(7, $player->score());
    }
}
