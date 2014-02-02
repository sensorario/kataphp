<?php

namespace Tests\Bowling\Implementation01;

use PHPUnit_Framework_TestCase;
use Bowling\Implementation01\Game;

class BowlingTest extends PHPUnit_Framework_TestCase
{
    public function testGame()
    {
        $game = new Game();
        $game->playFrame([10, 0]);
        $game->playFrame([10, 0]);
        $game->playFrame([10, 0]);
        $game->playFrame([10, 0]);
        $this->assertTrue($game->points() === [30, 30, 20, 10, 0, 0, 0, 0, 0, 0, 0]);
        $game->playFrame([10, 0]);
        $game->playFrame([10, 0]);
        $game->playFrame([10, 0]);
        $game->playFrame([10, 0]);
        $game->playFrame([10, 0]);
        $game->playFrame([10, 0]);
        $game->playFrame([10, 0]);
        $this->assertTrue($game->points() === [30, 30, 30, 30, 30, 30, 30, 30, 30, 20, 10]);
        $this->assertTrue($game->calculatePoints() === 300);
    }

    public function testGameMuddle()
    {
        $game = new Game();
        $game->playFrame([10, 0]);
        $this->assertTrue($game->shots() === [[10, 0], 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]);
        $this->assertTrue($game->points() === [10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]);
        $this->assertTrue($game->calculatePoints() === 10);
        $game->playFrame([10, 0]);
        $this->assertTrue($game->shots() === [[10, 0], [10, 0], 0, 0, 0, 0, 0, 0, 0, 0, 0]);
        $this->assertTrue($game->points() === [20, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0]);
        $this->assertTrue($game->calculatePoints() === 30);
        $game->playFrame([10, 0]);
        $this->assertTrue($game->shots() === [[10, 0], [10, 0], [10, 0], 0, 0, 0, 0, 0, 0, 0, 0]);
        $this->assertTrue($game->points() === [30, 20, 10, 0, 0, 0, 0, 0, 0, 0, 0]);
        $this->assertTrue($game->calculatePoints() === 60);
        $game->playFrame([2, 3]);
        $this->assertTrue($game->shots() === [[10, 0], [10, 0], [10, 0], [2, 3], 0, 0, 0, 0, 0, 0, 0]);
        $this->assertTrue($game->points() === [30, 25, 15, 5, 0, 0, 0, 0, 0, 0, 0]);
        $this->assertTrue($game->calculatePoints() === 75);
        $game->playFrame([0, 10]);
        $this->assertTrue($game->shots() === [[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], 0, 0, 0, 0, 0, 0]);
        $this->assertTrue($game->points() === [30, 25, 15, 5, 10, 0, 0, 0, 0, 0, 0]);
        $this->assertTrue($game->calculatePoints() === 85);
        $game->playFrame([0, 10]);
        $this->assertTrue($game->shots() === [[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10], 0, 0, 0, 0, 0]);
        $this->assertTrue($game->points() === [30, 25, 15, 5, 10, 10, 0, 0, 0, 0, 0]);
        $this->assertTrue($game->calculatePoints() === 95);
        $game->playFrame([3, 7]);
        $this->assertTrue($game->shots() === [[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10], [3, 7], 0, 0, 0, 0]);
        $this->assertTrue($game->points() === [30, 25, 15, 5, 10, 13, 10, 0, 0, 0, 0]);
        $this->assertTrue($game->calculatePoints() === 108);
        $game->playFrame([7, 3]);
        $this->assertTrue(
            $game->shots() === [[10, 0], [10, 0], [10, 0], [2, 3], [0, 10], [0, 10], [3, 7], [7, 3], 0, 0, 0]
        );
        $this->assertTrue($game->points() === [30, 25, 15, 5, 10, 13, 17, 10, 0, 0, 0]);
        $this->assertTrue($game->calculatePoints() === 125);
    }
}
