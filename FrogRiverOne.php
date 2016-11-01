<?php

function solution($X, $A) 
{
	// positions on the river where leaf has already fallen
	$coveredPositions = array();
	for($i = 0; $i < count($A); $i++)
	{
		// checking when the leaf has covered the position, 
		// we are interested only to get to end position $X
		if(empty($coveredPositions[$A[$i]]) && $A[$i] <= $X)
		{
			// $A[$i] is position, $i is the minute in which the position is covered
			$coveredPositions[$A[$i]] = $i;
			// if all positions to reach end positions are covered, we return minute when that happend
			if(count($coveredPositions) === $X)
				return $i;
		}
	}
	// if end position is not reached
	return -1;
}

$X = 5;
$A = array("1","3","1","4","2","3","5","4");
echo solution ($X, $A);

?>
