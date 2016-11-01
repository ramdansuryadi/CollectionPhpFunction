<?php

function solution($A)
{
	$N = count($A);
	// amount of non-divisors
	$nonDivisibles = array();
	// calculate how many times number occurs in original array
	$occurrence = array_fill(0, $N, 0);
	foreach($A as $val)
		$occurrence[$val] = isset($occurrence[$val]) ? $occurrence[$val] + 1 : 1;
	for($i = 0; $i < $N; $i++)
	{
		// define divisors number
		$divisorsCount = 0;
		for($j = 1; $j * $j <= $A[$i]; $j++)
		{
			// if $j is divisor of $A[$i] add number of occurences $j to $divisorsCount
			if($A[$i] % $j == 0) 
			{
				$divisorsCount += $occurrence[$j];
				// also add remainder of the division as a $A[$i] divisor
				if($A[$i] / $j != $j)
					$divisorsCount += $occurrence[$A[$i] / $j];
			}
		}
		// subtract divisors number from array length to get nonDivisible for element $i
		$nonDivisibles[$i] = $N - $divisorsCount;
	}
	return $nonDivisibles;
}

?>
