<?php
namespace Sensorario\DiamondKata;

use PHPUnit_Framework_TestCase;

final class DiamondKataTest extends PHPUnit_Framework_TestCase
{
    public function testOneDimentionalMatrix()
    {
        $matrix = DiamondKata::createFrom('A');

        $this->assertEquals(
            "A\n",
            $matrix->output()
        );

        $this->assertEquals(
            1,
            $matrix->size()
        );
    }

    public function testOutputWithBAsInput()
    {
        $matrix = DiamondKata::createFrom('B');

        $this->assertEquals(
            " A \n".
            "B B\n".
            " A \n",
            $matrix->output()
        );

        $this->assertEquals(
            3,
            $matrix->size()
        );
    }

    public function testOutputWithCAsInput()
    {
        $matrix = DiamondKata::createFrom('C');

        $this->assertEquals(
            "  A  \n".
            " B B \n".
            "C   C\n".
            " B B \n".
            "  A  \n",
            $matrix->output()
        );

        $this->assertEquals(
            5,
            $matrix->size()
        );
    }

    public function test()
    {
        $matrix = DiamondKata::createFrom('D');

        $this->assertEquals(
            "   A   \n".
            "  B B  \n".
            " C   C \n".
            "D     D\n".
            " C   C \n".
            "  B B  \n".
            "   A   \n",
            $matrix->output()
        );

        $this->assertEquals(
            7,
            $matrix->size()
        );
    }
}
