<?php
namespace Sensorario\ValueObjects;

use PHPUnit_Framework_TestCase;
use RuntimeException;

class StringAnalyzerTest extends PHPUnit_Framework_TestCase
{
    public function testAStandsForUno()
    {
        $result = new StringAnalyzer(
            $string = 'a/b/c'
        );

        $this->assertEquals(
            'uno',
            $result->value()
        );
    }

    public function testBStandsForUno()
    {
        $result = new StringAnalyzer(
            $string = 'b/b/c'
        );

        $this->assertEquals(
            'due',
            $result->value()
        );
    }

    /**
     * @expectedException RuntimeException
     */
    public function testCIsInvalidCharacter()
    {
        $result = new StringAnalyzer(
            $string = 'c/b/c'
        );
    }
}
