<?php

function solution($A)
{
	// integer count of occurrences
	$integerOccurrences = array();
	// the largest count of occurrences
	$maxOccurrences = 0;
	// key of integer which occurred most time
	$maxOccurrencesKey = null;
	foreach($A as $key => $value) 
	{
		if(empty($integerOccurrences[$value]))
			$integerOccurrences[$value] = 1;
		else
			$integerOccurrences[$value]++;
		// if maximum occurrence got larger
		if($integerOccurrences[$value] > $maxOccurrences)
		{
			$maxOccurrences = $integerOccurrences[$value];
			// storing key of maximum occured integer
			$maxOccurrencesKey = $key;
		}
	}
	// if key of max occured integer is not set, 
	// or max occured integer doesn't occurs in more than half of the elements of $A
	if($maxOccurrencesKey === null || ($maxOccurrences <= count($A) / 2))
		return -1;
	else
		return $maxOccurrencesKey;
}

$A = array("3","4","3","2","3","-1","3","3");

echo solution($A);

?>
