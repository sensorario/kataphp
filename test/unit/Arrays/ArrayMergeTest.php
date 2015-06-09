<?php

function array_merge_item ($first, $second)
{
	$merge = array_merge($first, $second);
	asort($merge);

	$newArray = [];

	foreach($merge as $value) {
		$newArray[(int)$value[0]] = true;
	}

	$wrap = [];
	foreach($newArray as $key => $value) {
		array_push($wrap, [$key]);
	}

	return $wrap;
}
	

class ArrayMergeTest extends PHPUnit_Framework_TestCase
{
	public function testMergeOfDifferentArrays()
	{
		$firstArray = [
			['500'],
			['502'],
			['501'],
		];
		
		$secondArray = [
			['503', 'ERROR_2'],
			['500', 'ERROR_1'],
			['501', 'ERROR_2'],
		];

		$this->assertEquals([
			['500'],
			['501'],
			['502'],
			['503'],
		], array_merge_item($firstArray, $secondArray));
	}
}
