<?php
namespace Sensorario\ValueObjects;

use PHPUnit_Framework_TestCase;

class SensorarioFullNameTest extends PHPUnit_Framework_TestCase
{
    public function testAcceptedAttributes()
    {
        $mandatoryAttributes = [
            'name',
            'surname',
        ];

        $this->assertEquals(
            SensorarioFullName::mandatoryAttributes(),
            $mandatoryAttributes
        );
    }

    public function testModifiedValueObjectIsNewValueObject()
    {
        $simone = SensorarioFullName::box([
            'name'    => 'Simone',
            'surname' => 'Gentili',
        ]);

        $demo = $simone->withNameSurname([
            'name'    => 'Simone',
            'surname' => 'Gentili',
        ]);

        $this->assertFalse($demo === $simone);
        $this->assertEquals($demo, $simone);
    }
}

