<?php

namespace Tests\Snippets;

use Snippets\IstanceOf\SubClassOne;
use Snippets\IstanceOf\SuperClassOne;

class IsSubClassOfTest extends \PHPUnit_Framework_TestCase
{
    public function testSubClassBad()
    {
        $subClass = new SubClassOne();
        $superClass = new SuperClassOne();
        $this->assertTrue($subClass instanceof $superClass);
    }

    public function testSubClassGood()
    {
        $this->assertTrue(is_subclass_of('Snippets\IstanceOf\SubClassOne', 'Snippets\IstanceOf\SuperClassOne'));
    }
}
