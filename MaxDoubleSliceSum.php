<?php

function solution($A)
{
	$N = count($A);
	// left max slice sums
	$leftMaxSliceSums = array(0, $N, 0);
	// right max slice sums
	$rightMaxSliceSums = array(0, $N, 0);
	// calculating left and right max slice sums, marginal integers are not counted
	for($i = 1; $i < ($N - 1); $i++)
		$leftMaxSliceSums[$i] = max(0, $leftMaxSliceSums[$i - 1] + $A[$i]);
	for($i = $N - 2; $i > 0; $i--)
		$rightMaxSliceSums[$i] = max(0, $rightMaxSliceSums[$i + 1] + $A[$i]);
	// maximum double slice sum
	$maxDoubleSliceSum = 0;
	for($i = 1; $i < ($N - 1); $i++)
	{
		$doubleSliceSum = $leftMaxSliceSums[$i - 1] + $rightMaxSliceSums[$i + 1];
		if($doubleSliceSum > $maxDoubleSliceSum)
			$maxDoubleSliceSum = $doubleSliceSum;
	}
	return $maxDoubleSliceSum;
}

$A = array("3","2","6","-1","4","5","-1","-2");

echo solution($A);

?>
