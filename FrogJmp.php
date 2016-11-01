<?php

function solution($X, $Y, $D)
{
	// distance between end ($Y) and start ($X) position
	$distance = $Y - $X;
	// number of jumps needed to reach or surpass end position
	$jumps = (int)ceil($distance / $D);
	return $jumps;
}

echo solution(10, 85, 30);

?>
