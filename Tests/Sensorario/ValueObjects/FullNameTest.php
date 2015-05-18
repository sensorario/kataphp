<?php
namespace Sensorario\ValueObjects;

use PHPUnit_Framework_TestCase;
use RuntimeException;

class FullNameTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException RuntimeException
     */
    public function testMiddleNameCannobeEmpty()
    {
        FullName::withNameMiddleSurname(
            new StringLiteral("Simone"),
            new StringLiteral(""),
            new StringLiteral("Gentili")
        );
    }

    public function testFunctionAreSideEffectFree()
    {
        $originalDemo = FullName::withNameMiddleSurname(
            new StringLiteral("Simone"),
            new StringLiteral("Demo"),
            new StringLiteral("Gentili")
        );

        $sensorario = $originalDemo->withMiddleName(
            new StringLiteral("Sensorario")
        );

        $demo = $sensorario->withMiddleName(
            new StringLiteral("Demo")
        );

        $this->assertTrue($sensorario != $originalDemo);
        $this->assertTrue($originalDemo == $demo);
        $this->assertFalse($originalDemo === $demo);
    }
}
