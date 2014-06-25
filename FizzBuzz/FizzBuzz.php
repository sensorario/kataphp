<?php

namespace FizzBuzz;

use FizzBuzz\Interfaces\FizzBuzz as FizzBuzzInterface;

class FizzBuzz implements FizzBuzzInterface
{
    private $output;
    private $number;

    public function output()
    {
        for ($i = 0; $i < 4; $i++) {
            $this->output .= $this->number % self::getDivisors()[$i] == 0
                ? self::getWords()[$i] : '';
        }

        return $this->output;
    }

    public static function getDivisors()
    {
        return [self::FIZZ_KEY, self::BUZZ_KEY, self::SUZZ_KEY, self::MAZZ_KEY];
    }

    public static function getWords()
    {
        return [self::FIZZ, self::BUZZ, self::SUZZ, self::MAZZ];
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
}
