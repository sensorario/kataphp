<?php
namespace Sensorario\ValueObjects;

use PHPUnit_Framework_TestCase;

class SpeakerTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->simone = new Speaker(
            new StringLiteral("Simone"),
            new StringLiteral("Gentili"),
            new IntegerValue("32")
        );
    }

    public function testSimoneAndHisTwinAreEquals()
    {
        $twin = new Speaker(
            new StringLiteral("Simone"),
            new StringLiteral("Gentili"),
            new IntegerValue("32")
        );

        $this->assertTrue($this->simone == $twin);
    }

    public function testTwiObjectAreNotEquals()
    {
        $davide = new Speaker(
            new StringLiteral("Davide"),
            new StringLiteral("Bellettini"),
            new IntegerValue("29")
        );

        $this->assertFalse($this->simone == $davide);
    }

    public function testGetters()
    {
        $this->assertEquals("Simone",  $this->simone->name());
        $this->assertEquals("Gentili", $this->simone->surname());
        $this->assertEquals(32,        $this->simone->age());
    }
}
