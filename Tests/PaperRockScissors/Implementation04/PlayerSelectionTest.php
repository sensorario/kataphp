<?php

namespace Tests\PaperRockScissors\Implementation04;

use PaperRockScissors\Implementation04\PlayerFactory;

class PlayerSelectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider selections
     */
    public function testPaperSelection($selection)
    {
        $player = PlayerFactory::builder($selection);
        $this->assertTrue($selection == $player->hasSelected());
    }

    public function selections()
    {
        return [
            ['paper'],
            ['rock'],
            ['scissors']
        ];
    }
}
