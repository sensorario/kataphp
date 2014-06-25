<?php

namespace FizzBuzz;

use FizzBuzz\Interfaces\FizzBuzz as FizzBuzzInterface;

class FizzBuzz implements FizzBuzzInterface
{
    private $output;
    private $number;

    public function __construct($number = null)
    {
        $this->number = $number;
    }

    public function output()
    {
        for ($i = 0; $i < 4; $i++) {
            $this->output .= $this->number % self::getDivisors()[$i] == 0
                ? ['Fizz', 'Buzz', 'Suzz', 'Mazz'][$i] : '';
        }

        return $this->output;
    }

    public static function getDivisors()
    {
        return [3, 5, 7, 10];
    }

    public static function getWords()
    {
        return ['Fizz', 'Buzz', 'Suzz', 'Mazz'];
    }

    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    public function getNumber()
    {
        return $this->number;
    }
}
