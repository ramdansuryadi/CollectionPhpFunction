<?php

function solution($K, $M, $A)
{
	// we'll use binary search algorithm to find minimum large sum
	// minimum large sum initialization, maximum array $A integer must in some block,
	// so large sum can't be lower than that
	$minSum = max($A);
	// maximum large sum is initialized to sum of all integers
	$maxSum = array_sum($A);
	// minimum block large sum which can be achieved by dividing array $A to $K blocks
	$resultingLargeSum = 0;
	while($minSum <= $maxSum)
	{
		// middle large sum
		$midSum = (int)ceil(($minSum + $maxSum) / 2);
		// minimum number of blocks which are required to get sum in every block 
		// which is not greater than maximum defined sum
		$blocksNeeded = maxSumLimitBlocks($A, $midSum);
		// if number of blocks does not exceed $K, 
		// we have new minimum sum which we are trying to lower in every iteration
		if($blocksNeeded <= $K)
		{
			$maxSum = $midSum - 1;
			$resultingLargeSum = $midSum;
		}
		else
			$minSum = $midSum + 1;
	}
	return $resultingLargeSum;
}
/**
 * Calculates minimum number of blocks in which array $A can be divided,
 * to get sum in every block which is not greater than maximum allowed block sum.
 * 
 * @param array $A
 * @param int $maxBlockSum Maximum sum which must not be exceeded in any block
 * 
 * @return int $blocksNumber The number of blocks on which array $A is a divided
 */
function maxSumLimitBlocks($A, $maxBlockSum)
{
	// number of array $A blocks required to have sum in all of them
	// which is less or equal to $maxBlockSum
	$blocksNumber = 1;
	$blockSum = $A[0];
	for($i = 1; $i < count($A); $i++)
	{
		// if block sum exceeds the maximum allowed sum
		if($blockSum + $A[$i] > $maxBlockSum)
		{
			// starting new block sum
			$blockSum = $A[$i];
			$blocksNumber += 1;
		}
		// if block sum does not exceed the maximum allowed sum
		else
			$blockSum += $A[$i];
	}
	return $blocksNumber;
}


?>
