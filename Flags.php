<?php

function solution($A)
{
	$N = count($A);
	$peaks = array(); // array_fill(0, $N, 0);
	// Populate array of peaks
	for($i = 1; $i < $N - 1; $i++)
		if($A[$i-1] < $A[$i] && $A[$i+1] < $A[$i])
			$peaks[] = $i;
	// Number of flags cannot be more than number of peaks
	// Number fo flags cannot be more than F, where F * (F - 1) <= count($A) - 1
	// Square inequality
	$a = 1;
	$b = -1;
	$c = -($N-1);
	$d = $b * $b - 4 * $a * $c;
	$x1 = (-$b + sqrt($d)) / (2 * $a);
	$x2 = (-$b - sqrt($d)) / (2 * $a);
	// Max possible number of flags
	$maxFlags = min(count($peaks), max($x1, $x2));
	// Range of flag numbers
	$flagsRange = range(intval($maxFlags), 1);
	// Loop through flag numbers
	foreach($flagsRange as $V)
	{
		// Number of unflagged peaks
		$flagsRemaining = $V;
		// Keep previous flagged peak
		$prevPeakIndex = null;
		// Current peak index
		$currPeakIndex = 0;
		// Loop through peaks
		while($currPeakIndex < count($peaks) && $flagsRemaining > 0)
		 {
			// If distance to previous flagged peak is >= than number f flags
			// OR there is no previous flagged peak, then we can flag this peak
			if($prevPeakIndex === null || $peaks[$currPeakIndex] - $peaks[$prevPeakIndex] >= $V)
			{
				$flagsRemaining--;
				$prevPeakIndex = $currPeakIndex;
			}
			$currPeakIndex++;
		}
		if($flagsRemaining == 0)
			return $V;
	}
	return 0;
}



?>
