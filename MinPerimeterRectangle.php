<?php

function solution($N)
{
	// all combinations of rectangle sides variations
	$rectangleSideCombinations = array();
	// for example, if N = 30, 
	// A can be [1, 2, 3, 5], 
	// resulting in B which can be [30, 15, 10, 6]
	// we use formula to find half of $N divisors, we don't need to find another half, 
	// because rectangle sides would just be mirrored, 
	// respectively we would have 2 exactly the same perimeters
	$i = 1;
	$j = 0;
	while($i * $i <= $N)
	{
		if($N % $i == 0)
		{	
			$rectangleSideCombinations[$j]['A'] = $i;
			$rectangleSideCombinations[$j]['B'] = $N / $i;
			$j++;
		}
		$i++;
	}
	// minimal rectangle perimeter
	$minPerimeter = null;
	foreach($rectangleSideCombinations as $rectangleSides)
	{
		$perimeter = 2 * ($rectangleSides['A'] + $rectangleSides['B']);
		if($minPerimeter === null || $perimeter < $minPerimeter)
			$minPerimeter = $perimeter;
	}
	return $minPerimeter;
}

$N = 30;

echo solution($N);

?>
