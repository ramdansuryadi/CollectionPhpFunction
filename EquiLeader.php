<?php

function solution($A)
{
	// integer count of occurrences
	$integerOccurrences = array();
	// the largest count of occurrences
	$maxOccurrences = 0;
	// leader
	$leader = null;
	// first we seek leader
	foreach($A as $value) 
	{
		if(empty($integerOccurrences[$value]))
			$integerOccurrences[$value] = 1;
		else
			$integerOccurrences[$value]++;
		// if maximum occurrence got larger
		if($integerOccurrences[$value] > $maxOccurrences)
		{
			$maxOccurrences = $integerOccurrences[$value];
			$leader = $value;
		}
	}
	// number of integers in array $A
	$N = count($A);
	// if leader is not set, 
	// or max occured integer doesn't occurs in more than half of the elements of $A
	if($leader === null || ($maxOccurrences <= $N / 2))
		return 0;
	// now we know which integer is leader, so we'll count number of equi leaders
	$equiLeaders = 0;
	// number of leaders in array $A subsequence
	$subSequenceLeaders = 0;
	// counting for equi leaders
	foreach($A as $key => $value)
	{
		// counting subsequence leaders, as we iterate through array $A subsequence grows,
		// first iteration subSequence:		[4]
		// second iteration subSequence:	[4, 3]
		// third iteration subSequence:		[4, 3, 4]
		// etc.
		if($value === $leader)
			$subSequenceLeaders++;
		// if leader occurs in more than half of the elements in current subsequence,
		// and there is still remaining more leader occurences than other integers occurences
		// in remaining part of array $A, we have equi leader
		if($subSequenceLeaders > ($key + 1) / 2 
			&& ($maxOccurrences - $subSequenceLeaders) > ($N - $key - 1) / 2)
			$equiLeaders++;
	}
	return $equiLeaders;
}

$A = array("4","3","4","4","4","2");

echo solution($A);

?>
