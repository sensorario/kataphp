<?php

namespace FizzBuzz\Interfaces;

interface FizzBuzz
{
    const FIZZ_KEY = 3;
    const FIZZ = 'Fizz';
    const BUZZ_KEY = 5;
    const BUZZ = 'Buzz';
    const SUZZ_KEY = 7;
    const SUZZ = 'Suzz';
    const MAZZ_KEY = 10;
    const MAZZ = 'Mazz';

    public static function getDivisors();

    public static function getWords();

    public function setNumber($number);

    public function getNumber();

    public static function match();

    public function getDivisor();

    public function isNumberDividableByDivisor();

    public static function countMatch();

    public function getWord();
}
