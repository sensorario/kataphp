<?php

namespace Tests\PaperRockScissors\Implementation03;

use PaperRockScissors\Implementation03\Player;

class PlayerFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testPlayerEntity()
    {
        $tizio = Player::createFromChoice(Player::CHOICE_PAPER);
        $this->assertEquals(get_class($tizio), 'PaperRockScissors\Implementation03\Player');
    }

    public function testPlayerEntityReturnsChoice()
    {
        $tizio = Player::createFromChoice(Player::CHOICE_PAPER);
        $this->assertEquals(Player::CHOICE_PAPER, $tizio->getChoice());
    }

    /**
     * @expectedException PaperRockScissors\Implementation03\InvalidArgumentException
     */
    public function testUnHapyPath()
    {
        Player::createFromChoice(234);
    }

    /**
     * @dataProvider winMatrix
     */
    public function testMatch($first, $second, $expect)
    {
        $tizio = Player::createFromChoice($first);
        $caio = Player::createFromChoice($second);
        $this->assertEquals($expect, $tizio->winVersus($caio));
    }

    public function winMatrix()
    {
        return [
            [Player::CHOICE_PAPER, Player::CHOICE_ROCK, true],
            [Player::CHOICE_ROCK, Player::CHOICE_SCISSORS, true],
            [Player::CHOICE_SCISSORS, Player::CHOICE_PAPER, true],
            [Player::CHOICE_SCISSORS, Player::CHOICE_ROCK, false],
            [Player::CHOICE_ROCK, Player::CHOICE_PAPER, false],
            [Player::CHOICE_PAPER, Player::CHOICE_SCISSORS, false],
        ];
    }
}
