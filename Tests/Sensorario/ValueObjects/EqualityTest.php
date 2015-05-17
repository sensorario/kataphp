<?php
namespace Sensorario\ValueObjects;

use PHPUnit_Framework_TestCase;
use Sensorario\ValueObjects\IntegerValue;
use Sensorario\ValueObjects\StringLiteral;

class SpeakerTest extends PHPUnit_Framework_TestCase
{
    public function testSimoneAndHisTwinAreEquals()
    {
        $simone = new Speaker(
            new StringLiteral("Simone"),
            new StringLiteral("Gentili"),
            new IntegerValue("32")
        );

        $twin = new Speaker(
            new StringLiteral("Simone"),
            new StringLiteral("Gentili"),
            new IntegerValue("32")
        );

        $this->assertTrue($simone == $twin);
    }

    public function testTwiObjectAreNotEquals()
    {
        $simone = new Speaker(
            new StringLiteral("Simone"),
            new StringLiteral("Gentili"),
            new IntegerValue("32")
        );

        $davide = new Speaker(
            new StringLiteral("Davide"),
            new StringLiteral("Bellettini"),
            new IntegerValue("29")
        );

        $this->assertFalse($simone == $davide);
    }

    public function testGetters()
    {
        $simone = new Speaker(
            new StringLiteral("Simone"),
            new StringLiteral("Gentili"),
            new IntegerValue("32")
        );

        $this->assertEquals("Simone",  $simone->name());
        $this->assertEquals("Gentili", $simone->surname());
        $this->assertEquals(32,        $simone->age());
    }
}
