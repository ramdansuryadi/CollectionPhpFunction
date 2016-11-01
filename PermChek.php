<?php
function solution($A)
{
	$N = count($A);
	$permutationSum = ((float)$N * ($N + 1)) / 2;
	$actualSum = array_sum($A);
	// if permuation sum does not match actual sum, we don't have permuation
	$diff = (int)($permutationSum - $actualSum);
	if($diff != 0)
		return 0;
	// now, [2, 2, 2, 4] gives the sum of 10, like [1 2 3 4], 
	// but first array is not permuationt, and second one is, so we check that all numbers are unique
	$uniqueA = array();
	foreach($A as $key => $number) 
	{
		if(empty($uniqueA[$number]))
			$uniqueA[$number] = 1;
		// if number is repeated
		else
			return 0;
	}
	return 1;
}

$A = array("4","1","3");
echo solution($A);
?>