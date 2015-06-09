<?php

namespace Tests\PHPInternals;

class CloningObjects extends \PHPUnit_Framework_TestCase
{
    public function testCloning()
    {
        $objA = new \stdClass();
        $objB = clone $objA;
        $this->assertFalse($objA === $objB);
    }
}
