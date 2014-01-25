<?php

namespace Tests\PaperRockScissors\Implementation04;

use PaperRockScissors\Implementation04\PlayerFactory;

class PlayerCreationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider buildParameters
     */
    public function testCreatePlayer()
    {
        $player = PlayerFactory::builder('paper');
        $this->assertTrue(get_class($player) == 'PaperRockScissors\Implementation04\ConcretePlayerPaper');
    }

    public function buildParameters()
    {
        return [
            ['paper', 'PaperRockScissors\Implementation04\ConcretePlayerPaper'],
            ['rock', 'PaperRockScissors\Implementation04\ConcretePlayerRock'],
            ['scissors', 'PaperRockScissors\Implementation04\ConcretePlayerScissors'],
        ];
    }
}
