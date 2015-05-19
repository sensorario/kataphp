<?php
namespace Sensorario\ValueObjects;

use PHPUnit_Framework_TestCase;
use RuntimeException;

class UltimateSpeakerTest extends PHPUnit_Framework_TestCase
{
    public function testAcceptedAttributes()
    {
        $mandatoryAttributes = [
            'name',
            'surname',
        ];

        $this->assertEquals(
            UltimateSpeaker::mandatoryAttributes(),
            $mandatoryAttributes
        );
    }

    public function testEquality()
    {
        $sensoraio = UltimateSpeaker::box([
            'name'    => 'Simone',
            'surname' => 'Gentili',
        ]);

        $secondo = UltimateSpeaker::box([
            'name'    => 'Simone',
            'surname' => 'Gentili',
        ]);

        $this->assertTrue($sensoraio == $secondo);
    }

    public function testImmutability()
    {
        $nomeSensorario = 'Sensorario';
        $nomeDemo       = 'Demo';

        $sensoraio = UltimateSpeaker::box([
            'name'    => $nomeSensorario,
            'surname' => 'Gentili',
        ]);

        $demo = $sensoraio->withName($nomeDemo);

        $this->assertFalse($sensoraio == $demo);
        $this->assertFalse($sensoraio->name() == $demo->name());
        $this->assertEquals($sensoraio->name(), $nomeSensorario);
        $this->assertTrue($demo->name() == $nomeDemo);
    }

    public function testModifiedValueObjectIsNewValueObject()
    {
        $simone = UltimateSpeaker::box([
            'name'    => 'Simone',
            'surname' => 'Gentili',
        ]);

        $demo = $simone->withName('Simone');

        $this->assertFalse($demo === $simone);
        $this->assertEquals($demo, $simone);
    }

    /** @expectedException RuntimeException */
    public function testUnavailableAttributeThrowsException()
    {
        UltimateSpeaker::box([
            'name'    => 'Simone',
            'surname' => 'Gentili',
            'nick'    => 'Demo',
        ]);
    }
}

