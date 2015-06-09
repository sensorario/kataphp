<?php
namespace Sensorario\ValueObjects;

use RuntimeException;

class StringAnalyzer
{
    private $value;

    public function __construct($string)
    {
        if (!preg_match('#^(a|b)/#', $string)) {
            throw new RuntimeException(
                'Invalid something'
            );
        }

        $this->value = [
            'a' => 'uno',
            'b' => 'due',
        ][current(explode('/', $string))];
    }

    public function value()
    {
        return $this->value;
    }
}
