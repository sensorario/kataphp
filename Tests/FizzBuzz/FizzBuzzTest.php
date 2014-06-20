<?php

namespace Tests\FizzBuzz;

use \PHPUnit_Framework_TestCase;
use FizzBuzz\FizzBuzz;

class FizzBuzzTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider inputs
     */
    public function testFizzBuzz($input, $output)
    {
        $this->assertEquals($output, (new FizzBuzz($input))->output());
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
            [3*5*10*7, 'FizzBuzzSuttMazz'],
            [3*7, 'FizzSutt'],
        ];
    }
}
