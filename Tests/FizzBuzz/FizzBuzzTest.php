<?php

namespace Tests\FizzBuzz;

use FizzBuzz\FizzBuzz;
use PHPUnit_Framework_TestCase;

function funFizzBuzz($n)
{
    for ($o = '', $i = 0; $i < 4; $i++)
        $o .= $n % [3, 5, 7, 10][$i] == 0
            ? ['Fizz', 'Buzz', 'Suzz', 'Mazz'][$i] : '';
    return $o;
}

class FizzBuzzTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider inputs
     */
    public function testFizzBuzz($input, $output)
    {
        $this->assertEquals($output, (new FizzBuzz())->setNumber($input)->output());
        $this->assertEquals($output, funFizzBuzz($input));
    }

    public function inputs()
    {
        return [
            [3, 'Fizz'],
            [5, 'Buzz'],
            [15, 'FizzBuzz'],
            [6, 'Fizz'],
            [30, 'FizzBuzzMazz'],
            [10, 'BuzzMazz'],
            [3 * 5 * 10 * 7, 'FizzBuzzSuzzMazz'],
            [3 * 7, 'FizzSuzz'],
        ];
    }

    public function testDivisorsList()
    {
        $this->assertEquals([3, 5, 7, 10], FizzBuzz::getDivisors());
    }

    public function testWordList()
    {
        $this->assertEquals(['Fizz', 'Buzz', 'Suzz', 'Mazz'], FizzBuzz::getWords());
    }

    public function testSetters()
    {
        $fizz = (new FizzBuzz(666))
            ->setNumber(666);

        $this->assertTrue($fizz instanceof FizzBuzz);
        $this->assertEquals(666, $fizz->getNumber());
    }

    public function testMatch()
    {
        $match = [
            3 => 'Fizz',
            5 => 'Buzz',
            7 => 'Suzz',
            10 => 'Mazz',
        ];

        $this->assertEquals($match, FizzBuzz::match());
    }
}
