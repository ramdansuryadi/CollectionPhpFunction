<?php

function solution($A)
{
	// key to solve this task in O(n) time complexity is to realize that 
	// all the longer slices with minimal average are built up with
	// 2-integer and/or 3-integer small slices, and some of them have global minimal average
	// 
	// if slice count is even, it can be divided in small 2-integer slices
	// if slice count is odd, it can be divided in small 2-integer and 3-integer slices
	// minimum average is initialized to starting slice average
	$minSliceAvg = ($A[0] + $A[1]) / 2;
	// starting position of the first slice with minimum average
	$minSliceAvgKey = 0;
	for($i = 0; $i < count($A) - 1; $i++)
	{
		// 2 integers slice
		$sliceMin = ($A[$i] + $A[$i+1]) / 2;
		if($sliceMin < $minSliceAvg)
		{
			$minSliceAvg = $sliceMin;
			$minSliceAvgKey = $i;
		}
		// this condition is important only for last iteration 
		// to stop PHP notice and thereby incorrect calculation
		if(isset($A[$i+2]))
		{
			// 3 integers slice
			$sliceMin = ($A[$i] + $A[$i+1] + $A[$i+2]) / 3;
			if($sliceMin < $minSliceAvg)
			{
				$minSliceAvg = $sliceMin;
				$minSliceAvgKey = $i;
			}
		}
	}
	return $minSliceAvgKey;
}


$A = array("4","2","2","5","1","5","8");
echo solution($A);

?>
