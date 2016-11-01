<?php

function solution($A) 
{
	// all discs are on x=0 axis of coordinate system, only y position is growing
	// number of intersecting discs
	$intersectingDiscs = 0;
	// number of discs started at some position
	$dsp = array_fill(0, count($A), 0);
	// number of discs ended at some position
	$dep = array_fill(0, count($A), 0);
	for($i = 0; $i < count($A); $i++)
	{
		// indexes are staying in [0, N-1] domain
		// disc started position index
		$dspIndex = max(0, $i - $A[$i]);
		// disc end position index
		$depIndex = min(count($A) - 1, $i + $A[$i]);
		// number of discs started at some position
		$dsp[$dspIndex]++;
		// number of discs ended at some position
		$dep[$depIndex]++;
	}
	// current discs at each position (which are started, but not yet ended)
	$currentDiscs = 0;
	// iterating through positions, [0, N-1] domain 
	for($i = 0; $i < count($A); $i++)
	{
		// if there are discs which start at this position
		if($dsp[$i] > 0)
		{
			// current discs multiplied by count of discs which started at position $i
			$intersectingDiscs += $currentDiscs * $dsp[$i];
			// intersections of already started discs
			// Gauss sum formula n(n + 1)/2, where n = $dsp[$i] - 1, which leads to: 
			// ($dsp[$i] - 1) * [($dsp[$i] - 1) + 1] / 2 => $dsp[$i] * ($dsp[$i] - 1) / 2
			$intersectingDiscs += $dsp[$i] * ($dsp[$i] - 1) / 2;
			// if the number of intersecting pairs exceeds 10,000,000 
			if($intersectingDiscs > 10000000)
				return -1;
			
			// discs started at this position
			$currentDiscs += $dsp[$i];
		}
		// discs ended at this position
		$currentDiscs -= $dep[$i];
	}
	return $intersectingDiscs;
}

$A = array("1","5","2","1","4","0");
echo solution($A);


?>
