<?php

namespace Tests\ArraySorts;

use DateTime;
use \PHPUnit_Framework_Testcase;

class SortSnippets extends \PHPUnit_Framework_Testcase
{
    public function testSortByValue()
    {
        $unsorted = [
            'Andrea Dusi' => (new DateTime("January 5, 1982"))->format('d/m'),
            'Simone Gentili' => (new DateTime("January 1, 1982"))->format('d/m'),
            'Cesare D\'Amico' => (new DateTime("January 2, 1982"))->format('d/m'),
            'Marco Albarelli' => (new DateTime("January 4, 1982"))->format('d/m'),
        ];

        $sorted = array(
            'Simone Gentili' => (new DateTime("January 1, 1982"))->format('d/m'),
            'Cesare D\'Amico' => (new DateTime("January 2, 1982"))->format('d/m'),
            'Marco Albarelli' => (new DateTime("January 4, 1982"))->format('d/m'),
            'Andrea Dusi' => (new DateTime("January 5, 1982"))->format('d/m'),
        );

        natsort($unsorted);

        $this->assertEquals($sorted, $unsorted);
    }
}
