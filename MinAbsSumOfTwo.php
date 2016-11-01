<?php

function solution($A)
{
	// sorting array $A from lowest to highest integer
	sort($A);
	$minAbsSum = null;
	// starting position initialization
	$i = 0;
	// ending position initialization
	$j = count($A) - 1;
	// we are searching for smallest absolute pair sum
	while($i <= $j) 
	{
		$sum = $A[$i] + $A[$j];
		$absSum = abs($sum);
		if($minAbsSum === null || $absSum < $minAbsSum)
			$minAbsSum = $absSum;
		// 0 is smallest absolute minimum pair sum we can get, therefore we strive to 0
		// if sum is equal to zero, that is the smallest value possible, so we break loop
		if($sum === 0)
			break;
		// if sum is lower than zero, we increase $i to get higher sum, closer to zero
		elseif($sum < 0)
			$i++;
		// if sum is higher than zero, we decrease $j to get lower sum, closer to zero
		else 
			$j--;
	}
	return $minAbsSum;
}

?>
