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

        $genericArray = [
            'a' => 'uno',
            'b' => 'due',
        ];

        $this->value = $genericArray[current(explode('/', $string))];
    }

    public function value()
    {
        return $this->value;
    }
}
