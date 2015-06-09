<?php
namespace Sensorario\ValueObjects;

use RuntimeException;

class FullName
{
    private $name;

    private $middleName;

    private $surname;

    private function __construct(
        StringLiteral $name,
        StringLiteral $middleName,
        StringLiteral $surname
    )
    {
        $this->name       = $name;
        $this->middleName = $middleName;
        $this->surname    = $surname;
    }

    public static function withNameMiddleSurname(
        StringLiteral $name,
        StringLiteral $middleName,
        StringLiteral $surname
    )
    {
        if ($middleName->value() === "") {
            throw new RuntimeException(
                'Must provide a middle name or initial.'
            );
        }

        return new self(
            $name,
            $middleName,
            $surname
        );
    }

    public function withMiddleName(
        StringLiteral $middleName
    )
    {
        return new self(
            $this->name,
            $middleName,
            $this->surname
        );
    }

    public function withOtherNickName(FullName $other)
    {
        return $this->withMiddleName($other->middleName());
    }

    public function middleName()
    {
        return $this->middleName;
    }
}
