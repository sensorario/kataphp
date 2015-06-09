<?php
namespace Sensorario\ValueObjects;

class IntegerValue
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function value()
    {
        return (int) $this->value;
    }
}
