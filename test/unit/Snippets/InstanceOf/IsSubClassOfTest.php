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
        $subClassOne = 'Snippets\IstanceOf\SubClassOne';
        $superClassOne = 'Snippets\IstanceOf\SuperClassOne';

        $this->assertTrue(is_subclass_of($subClassOne, $superClassOne));
    }
}
