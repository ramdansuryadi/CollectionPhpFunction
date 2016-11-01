<?php

function solution($A)
{
	// maximum sum that could be achieved from start to some square
	$currentSquareMaxSum = array();
	// there is only one way to get to first square
	$currentSquareMaxSum[0] = $A[0];
	for($i = 1; $i < count($A); $i++)
	{
		// last 6 squares, or less if we haven't iterated through at least 6 of them
		$lastSquares = min($i, 6);
		// searching for maximum sum that could be achieved from start to current square
		for($j = $lastSquares; $j > 0; $j--)
		{
			// if current maximum square sum is not set
			if(!isset($currentSquareMaxSum[$i]))
				$currentSquareMaxSum[$i] = $currentSquareMaxSum[$i - $j];
			// if current maximum square sum is set, we are searching for biggest one in last 6 squares
			else	
				$currentSquareMaxSum[$i] = max($currentSquareMaxSum[$i], $currentSquareMaxSum[$i - $j]);
		}
		// adding current square integer
		$currentSquareMaxSum[$i] += $A[$i];
	}
	// last square sum is maximum achievable sum 
	return $currentSquareMaxSum[count($A) - 1];
}

?>
