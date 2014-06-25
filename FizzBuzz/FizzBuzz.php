<?php

namespace FizzBuzz;

use FizzBuzz\Interfaces\FizzBuzz as FizzBuzzInterface;

class FizzBuzz implements FizzBuzzInterface
{
    private $output;
    private $number;
    private $i;

    public function output()
    {
        $this->output = '';

        for ($this->i = 0; $this->i < self::countMatch(); $this->i++) {
            if ($this->isNumberDividableByDivisor()) {
                $this->output .= self::getWords()[$this->i];
            }
        }

        return $this->output;
    }

    public static function getDivisors()
    {
        return array_keys(self::match());
    }

    public static function getWords()
    {
        return array_values(self::match());
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

    public static function match()
    {
        return [
            self::FIZZ_KEY => self::FIZZ,
            self::BUZZ_KEY => self::BUZZ,
            self::SUZZ_KEY => self::SUZZ,
            self::MAZZ_KEY => self::MAZZ,
        ];
    }

    public function getDivisor()
    {
        return self::getDivisors()[$this->i];
    }

    public function isNumberDividableByDivisor()
    {
        return $this->getNumber() % $this->getDivisor() == 0;
    }

    public static function countMatch()
    {
        return count(self::match());
    }

    public function getWord()
    {
        return self::getWords()[$this->i];
    }
}
