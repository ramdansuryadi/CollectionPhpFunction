<?php


function solution($A)
{
	// maximum number of blocks with a peak
	$maxBlocks = 0;
	$N = count($A);
	// does peak exist on every position, first and last element can't be peaks,
	// because first one wouldn't have left neighbor, and last one wouldn't have right neighbor 
	$peakOnPosition = array();
	for($i = 1; $i < $N - 1; $i++)
	{
		if($A[$i] > $A[$i - 1] && $A[$i] > $A[$i + 1])
			$peakOnPosition[] = $i;
	}
	$divisors = findDivisors($N);
	$blockSizes = array_slice($divisors, 1);
	// we are searching for maximum number of blocks with all peaks
	foreach($blockSizes as $blockSize)
	{
		$blockWithoutPeakFounded = false;
		// we iterate through every possible block size
		for($i = $blockSize; $i <= $N; $i += $blockSize)
		{
			// first block, we want to include first right block element
			if($i === $blockSize)
			{
				$blockStartPosition = 0;
				$blockEndPosition = $blockSize;
			}
			// last block, we want to include last left block element
			elseif($i === $N)
			{
				$blockStartPosition = ($N - 1) - $blockSize;
				$blockEndPosition = $N - 1;
			}
			// we want to include last element of left block and first element of right block
			else
			{
				$blockStartPosition = ($i - 1) - $blockSize;
				$blockEndPosition = ($i - 1) + 1;
			}
			$blockHasPeak = isPeakInBlock($peakOnPosition, $blockStartPosition, $blockEndPosition);
			// if block doesn't have a peak
			if(!$blockHasPeak)
			{
				$blockWithoutPeakFounded = true;
				break;
			}
		}
		// if we have founded maximum number of blocks with a peak
		if(!$blockWithoutPeakFounded)
		{
			$maxBlocks = $N / $blockSize;
			break;
		}
	}
	return $maxBlocks;
}
/**
 * Finds all divisors of the number.
 *
 * @param int $N The number for which divisors seeked
 * @return int[] divisors Divisors sorted ascending
 */
function findDivisors($N)
{
	// divisors
	$divisors = array();
	// for example, if N = 36, divisors are [1, 2, 3, 4, 6, 9, 12, 18]
	// we use i * i < n formula to find divisors
	$i = 1;
	while($i * $i <= $N)
	{
		if($N % $i == 0)
		{
			// factors are mirrored, so we add +2, for example
			// i = 1, 36 / 1 = 36 exist,
			// i = 2, 36 / 2 = 18 exist,
			// i = 3, 36 / 3 = 12 exist, etc...
			if($i * $i < $N)
			{
				$divisors[] = $i;
				$divisors[] = $N / $i;
			}
			// i = 6, 36 / 6 = 6 exist, for example
			// we don't want to count same factor twice, so we add +1
			else
				$divisors[] = $i;
		}
		$i++;
	}
	sort($divisors);
	return $divisors;
}
/**
 * Does block contain a peak.
 * 
 * @param int[] $peakOnPosition Positions with peak
 * @param int $blockStartPosition First block position
 * @param int $blockEndPosition Last block position
 * 
 * @return boolean
 */
function isPeakInBlock($peakOnPosition, $blockStartPosition, $blockEndPosition)
{
	$beg = 0;
	$end = count($peakOnPosition) - 1;
	$isPeakInBlock = false;
	while($beg <= $end)
	{
		$mid = (int)(($beg + $end) / 2);
		// first and last element can't be peaks
		if($peakOnPosition[$mid] > $blockStartPosition && $peakOnPosition[$mid] < $blockEndPosition)
		{
			$isPeakInBlock = true;
			break;
		}
		elseif($peakOnPosition[$mid] <= $blockStartPosition)
			$beg = $mid + 1;
		else
			$end = $mid - 1;
	}
	return $isPeakInBlock;
}


?>
