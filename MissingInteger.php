<?php

function solution($A)
{
	// positive unique integers 
	$positiveUnique = array();
	for($i = 0; $i < count($A); $i++)
		// if integer is positive, and not already in array
		if($A[$i] > 0 && empty($positiveUnique[$A[$i]]))
			// $positiveUnique array key matches value
			$positiveUnique[$A[$i]] = $A[$i];
	// if there is no positive integers, then the minimum positive integer not found is 1
	if(count($positiveUnique) === 0)
		return 1;
	// if there are positive integers
	else
	{
		// maximum positive unique integer
		$max = max($positiveUnique);
		// we are searching the first integer which is not in the $positiveUnique array
		// upper iteration limit is maximum positive unique integer 
		// because we are searching first missing one till the maximum
		for($i = 1; $i < $max; $i++)
			if(empty($positiveUnique[$i]))
				return $i;	
	}
	// if we have situation like this $A = [1, 2, 3, 4], first missing one is bigger then maximum
	return $max + 1;
}

$A = array("1","3","6","4","1","2");
echo solution ($A);

?>
