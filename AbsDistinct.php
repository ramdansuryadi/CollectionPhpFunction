<?php
function solution($A)
{
	// absolute distinct integers in array $A
	$absDistinct = array();
	foreach($A as $value) 
	{
		$absValue = abs($value);
		// array_key_exists complexity is really close to O(1)
		// if this is integer which absolute value is not in the distinct array 
		if(!array_key_exists($absValue, $absDistinct))
			$absDistinct[$absValue] = $absValue;
	}
	// count of absolute distinct integers in array $A
	$absDistinctCount = count($absDistinct);
	return $absDistinctCount;
}

?>
