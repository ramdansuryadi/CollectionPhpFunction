<?php

function solution($N, $P, $Q)
{
	// primes from 2 to N, first we fill $primes array with consecutive integers from 2 to N
	$primes = array();
	for($i = 2; $i <= $N; $i++)
		$primes[$i] = $i;
	// now we use sieve of Eratosthenes algorithm to filter prime integers
	$i = 2;
	while($i * $i <= $N)
	{
		// we start from first integer multiple, for example, 
		// if integer is 2, we start from 4
		// if integer is 3, we start from 6, etc.,
		// and remove every integer multiple, after last iteration, only primes remain
		for($j = $i + $i; $j <= $N; $j += $i) 
			unset($primes[$j]);
		$i++;
	}
	// we strip keys from array, to get zero-indexed array
	$primes = array_values($primes);
	// semiprime integers from 2 to $N
	$semiPrimes = array();
	// semiprime is 2 primes multiplication, it can be 2 same or distinct primes
	// for example, if prime is 2, semiprimes are, 
	// 2 * 2 = 4
	// 2 * 3 = 6, etc.
	for($i = 0; $i < count($primes); $i++)
	{
		for($j = $i; $j < count($primes); $j++)
		{
			$primesProduct = $primes[$i] * $primes[$j];
			if($primesProduct <= $N)
				$semiPrimes[$primesProduct] = $primesProduct;
			else
				break;
		}
	}
	// this $semiPrimes array reorganization is very important for later speed
	// when we will use array_key_exists function instead of array_search function for
	// searching semiprime inside some range, because it is much faster;
	// array_key_exists Big-O is really close to O(1), and array_search Big-O is O(n)
	// first we sort array by key, and value of every key marks array position, starting from 1
	ksort($semiPrimes);
	$i = 1;
	foreach($semiPrimes as $value)
	{
		$semiPrimes[$value] = $i;
		$i++;
	}
	// $P and $Q have $M number of elements
	$M = count($P);
	// number of semiprimes in given range
	$rangeSemiprimesCount = array();
	// iterating through $P[$i] and $Q[$i] ranges
	for($i = 0; $i < $M; $i++)
	{
		$leftKey = null;
		$rightKey = null;
		$range = $Q[$i] - $P[$i];
		// we are looking for first left semiprime key which is higher or equal than $P[$i]
		if(array_key_exists($P[$i], $semiPrimes))
			$leftKey = $P[$i];
		else
		{
			for($j = 1; $j <= $range; $j++)
				if(array_key_exists($P[$i] + $j, $semiPrimes))
				{
					$leftKey = $P[$i] + $j;
					break;
				}
		}
		// we are looking for first right semiprime key which is equal or lower than $Q[$i]
		if(array_key_exists($Q[$i], $semiPrimes))
			$rightKey = $Q[$i];
		else
		{
			for($j = 1; $j <= $range; $j++)
				if(array_key_exists($Q[$i] - $j, $semiPrimes))
				{
					$rightKey = $Q[$i] - $j;
					break;
				}
		}
		//  if no semiprimes exist within range
		if($leftKey === null || $rightKey === null)
			$rangeSemiprimesCount[$i] = 0;
		// example for $P[$i] = 4, $Q[$i] = 4, one boundary semiprime exist 
		elseif($rightKey === $leftKey)
			$rangeSemiprimesCount[$i] = 1;
		else
			// we count boundary semiprimes too
			$rangeSemiprimesCount[$i] = $semiPrimes[$rightKey] - $semiPrimes[$leftKey] + 1;
	}
	return $rangeSemiprimesCount;
}

?>
