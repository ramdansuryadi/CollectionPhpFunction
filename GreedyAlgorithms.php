<?php

function solution($A, $B)
{
	// the size of a non-overlapping set containing a maximal number of segments
	$maxNonOverlapping = 0;
	$N = count($A);
	// ending segment point after every iteration
	$end = -1;
	for($i = 0; $i < $N; $i++)
	{
		// if start of new segment is bigger than the end of last segment
		if($A[$i] > $end)
		{
			$maxNonOverlapping++;
			$end = $B[$i];
		}
	}
	return $maxNonOverlapping;
}

?>
