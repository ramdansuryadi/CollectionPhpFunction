<?php

function solution($N)
{
	// number of factors/divisors
	$factorsCount = 0;
	// for example, if N = 36, factors are [1, 2, 3, 4, 6, 9, 12, 18]
	// we use i * i < n formula to count divisors
	$i = 1;
	while($i * $i <= $N)
	{
		if($N % $i == 0)
		{
			// factors are mirrored, so we add +2
			// i = 1, 36 / 1 = 36 exist,
			// i = 2, 36 / 2 = 18 exist,
			// i = 3, 36 / 3 = 12 exist, etc...
			if($i * $i < $N)
				$factorsCount += 2;
			// i = 6, 36 / 6 = 6 exist,
			// we don't want to count same factor twice, so we add +1
			else
				$factorsCount += 1;
		}
		$i++;
	}
	return $factorsCount;
}


$N = 24;

echo solution($N);

?>
