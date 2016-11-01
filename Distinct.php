<?php

function solution($A) 
{
	// this can be also solved with: return count(array_count_values($A));
	// or: return count(array_flip(array_flip(array_reverse($A, true))));
	// array which contains distinct values of array $A
	$distinct = array();
	foreach($A as $value) 
	{
		// saving distinct values by key ensures uniqueness
		if(empty($distinct[$value]))
			$distinct[$value] = $value;
	}
	// number of distinct values in array $A
	$distinctCount = count($distinct);
	return $distinctCount;
}


$A = array("2","1","1","2","3","1");

echo solution($A)
?>