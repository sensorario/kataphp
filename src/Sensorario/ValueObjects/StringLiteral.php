<?php
namespace Sensorario\ValueObjects;

class StringLiteral
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function value()
    {
        return (string) $this->value;
    }
}
