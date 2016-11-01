<?php

function solution($A)
{
	// maximum slice sum
	$maxSliceSum = $A[0];
	// maximum sum after n-th integer
	$maxSliceAfterInt = $A[0];
	for($i = 1; $i < count($A); $i++)
	{
		$maxSliceAfterInt = max($A[$i], $maxSliceAfterInt + $A[$i]);
		$maxSliceSum = max($maxSliceSum, $maxSliceAfterInt);
	}
	return $maxSliceSum;
}

$A = array("3","2","-6","4","0");

echo solution($A);

?>
