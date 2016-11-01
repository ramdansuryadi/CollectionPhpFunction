<?php

function solution($K, $A)
{
	// maximum number of ropes of length greater than or equal to K that can be created
	$ropesCount = 0; 
	// sum of tied ropes
	$sumLength = 0;
	foreach($A as $ropeLength)
	{
		$sumLength += $ropeLength;
		if($sumLength >= $K)
		{
			$sumLength = 0;
			$ropesCount++;
		}
	}
	return $ropesCount;
}

?>
