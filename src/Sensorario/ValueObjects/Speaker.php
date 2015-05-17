<?php
namespace Sensorario\ValueObjects;

class Speaker
{
    public function __construct(
        StringLiteral $name,
        StringLiteral $surname,
        IntegerValue  $age
    )
    {
        $this->name    = $name->value();
        $this->surname = $surname->value();
        $this->age     = $age->value();
    }

    public function name()
    {
        return $this->name;
    }

    public function surname()
    {
        return $this->surname;
    }

    public function age()
    {
        return $this->age;
    }
}
