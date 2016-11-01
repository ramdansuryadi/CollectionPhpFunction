<?php

function solution($M, $A) 
{
	// $M is excess data, we are not going to use it
	$N = count($A);
	$maxDistinctSlicesLimit = 1000000000;
	$distinctIntegersSlice = array();
	$distinctSlices = 0;
	// caterpillar back position
	$back = 0;
	for($i = 0; $i < count($A); $i++) 
	{
		// if integer is unique
		if(!isset($distinctIntegersSlice[$A[$i]]))
			$distinctIntegersSlice[$A[$i]] = $i;
		// if integer is duplicate
		else 
		{
			// array slice duplicate first position
			$duplicateFirstIndex = $distinctIntegersSlice[$A[$i]];
			// caterpillar front position
			$front = $duplicateFirstIndex + 1;
			// number of distinct slices reminds to Gauss formula, n * (n + 1) / 2,
			// but it is little changed to solve duplication problem
			$distinctSlices += ($front - $back) * ($i - $back + $i - $front + 1) / 2;
			// cleaning distinct slice integers which will be left behind caterpillar movement
			for($j = $back; $j < $front; $j++)
				unset($distinctIntegersSlice[$A[$j]]);
			// we add new integer, as we cleaned $distinctIntegersSlice array, 
			// it is not duplicated integer any more
			$distinctIntegersSlice[$A[$i]] = $i;
			// caterpillar movement
			$back = $front;
		}
	}
	// adding last distinct slices, which come after integer that was last duplicated integer
	$distinctSlices += ($N - $back) * ($N - $back + 1) / 2;
	// if the number of distinct slices is greater than 1,000,000,000, 
	// the function should return 1,000,000,000
	if($distinctSlices > $maxDistinctSlicesLimit) 
		$distinctSlices = $maxDistinctSlicesLimit;
	return $distinctSlices;
}

?>
