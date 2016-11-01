<?php


function solution($A) 
{
	// left sum after array $A splits, initialized to 0
	$leftSum = 0;
	// right sum after array $A splits, initialized to sum of all array $A elements
	$rightSum = array_sum($A);
	// minimal difference between left and right sum
	$diff = null;
	// at least one element needs to be on right side,
	// that is the reason why we iterate to "count($A) - 1"
	for($i = 0; $i < count($A) - 1; $i++) 
	{
		$leftSum += $A[$i];
		$rightSum -= $A[$i];
		// if diff is uninitialized, or difference is new absolute minimum difference
		if($diff === null || abs($leftSum - $rightSum) < $diff)
			$diff = abs($leftSum - $rightSum);
	}
	
	return $diff;
}

$A = array("3","1","2","4","3");
echo solution($A);

?>