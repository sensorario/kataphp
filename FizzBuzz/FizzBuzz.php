<?php

namespace FizzBuzz;

use FizzBuzz\Interfaces\FizzBuzz as FizzBuzzInterface;

class FizzBuzz implements FizzBuzzInterface
{
    private $output;

    public function __construct($number)
    {
        for ($i = 0; $i < 4; $i++) {
            $this->output .= $number % [3, 5, 7, 10][$i] == 0
                ? ['Fizz', 'Buzz', 'Suzz', 'Mazz'][$i] : '';
        }
    }

    public function output()
    {
        return $this->output;
    }

    public static function getDivisors()
    {
        return [3, 5, 7, 10];
    }
}
