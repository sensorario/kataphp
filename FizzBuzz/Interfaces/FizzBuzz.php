<?php

namespace FizzBuzz\Interfaces;

interface FizzBuzz
{
    public static function getDivisors();

    public static function getWords();

    public function setNumber($number);

    public function getNumber();
}
