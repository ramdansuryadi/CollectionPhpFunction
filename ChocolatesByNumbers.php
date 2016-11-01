<?php

function solution($N, $M)
{
	// first we will explain why we are looking for the greatest common divisor of $N and $M
	// we have 10 chocolates, on positions from 0 - 9, and $M which represent positions jump
	// if we start from 0, next positions we will are 
	// 0 + 4 = 4 (skipping 1, 2, 3),
	// 4 + 4 = 8 (skipping 5, 6, 7), 
	// 8 + 4 = 2 (skipping 9, 0, 1),
	// 2 + 4 = 6 (skipping 3, 4, 5)
	// 6 + 4 = 0 (skipping 7, 8, 9) // empty wrappper, 
	// so we ate chocolates on positions 0, 4, 8, 2, 6
	
	// we can see, the full circle will close, in other words we will come to the starting position
	// after exactly: lowest common multiple of '$N = circle size' and '$M = jump' / '$M =jump' times
	// it follows: $eatenChocolates = lcm / M
	
	// now little math:
	// lcm = N * M / gcd, where gcd is greatest common divisor
	// it follows: 
	// 	$eatenChocolates = (N * M / gcd) / M
	// 	$eatenChocolates = N / gcd
	// on example (N = 10, M = 4):
	// 	gcd = 2
	// 	lcm = 10 * 4 / 2 = 20
	// 	$eatenChocolates = lcm / M = 20 / 4 = 5, or
	// 	$eatenChocolates = N / gcd = 10 / 2 = 5
	return $N / gcd($N, $M);
}
/**
 * Computes the greatest common divisor (gcd) of two positive integers.
 * 
 * @param int $a First positive integer
 * @param int $b Second positive integer
 * @return int $a and $b greatest common divisor
 */
function gcd($a, $b) 
{
	if($a < $b)
		return gcd($b, $a);
	if($a % $b === 0)
		return $b;
	else
		return gcd($b, $a % $b);
}

?>
