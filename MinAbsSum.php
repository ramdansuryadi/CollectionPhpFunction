<?php

function solution($A)
{
	// https://codility.com/media/train/solution-min-abs-sum.pdf
	$N = count($A);
	// making all array $A values positive (absolute)
	for($i = 0; $i < $N; $i++)
		$A[$i] = abs($A[$i]);
	// maximum absolute array $A value
	$M = max($A);
	// sum of all absolute array $A values
	$sum = array_sum($A);
	// number of times some absolute integer value appeared
	$occurrenceCount = array();
	for($i = 0; $i < $N; $i++)
		if(!isset($occurrenceCount[$A[$i]]))
			$occurrenceCount[$A[$i]] = 1;
		else
			$occurrenceCount[$A[$i]] += 1;
	// dp[$j] denotes how many values [$i] remain (maximally) after achieving sum [$j]
	$dp = array();
	$dp[0] = 0;
	// iterating from 1 to maximum absolute array $A value
	for($i = 1; $i <= $M; $i++)
	{
		// if this absolute integer exist
		if(isset($occurrenceCount[$i]))
		{
			for($j = 0; $j < $sum; $j++)
			{
				// if the previous value at $dp[$j] >= 0 then we can set
				// $dp[$j] = $occurrenceCount[$i] as no value $i is needed to obtain the sum
				if(isset($dp[$j]) && $dp[$j] >= 0)
					$dp[$j] = $occurrenceCount[$i];
				// otherwise we must obtain sum $j − $i first and then use a number $i to get sum $j
				elseif($j >= $i && isset($dp[$j - $i]) && $dp[$j - $i] > 0)
					$dp[$j] = $dp[$j - $i] - 1;
			}
		}
	}
	$result = $sum;
	// we choose the best sum value (closest to half of $sum)
	for($j = 0; $j < (int)($sum / 2) + 1; $j++)
		if(isset($dp[$j]) && $dp[$j] >= 0)
			$result = min($result, $sum - 2 * $j);
	return $result;
}

?>
