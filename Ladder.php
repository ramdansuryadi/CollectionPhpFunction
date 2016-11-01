<?php

function solution($A, $B)
{
	$L = count($A);
	// maximum rungs number
	$MAX_RUNGS = max($A);
	// modulo P range
	$MIN_P = min($B);
	$MAX_P = max($B);
	// The most important thing is to understand that the number of different ways
	// of climbing to the top of the ladder with N rungs is Fibonacci(N+1) combinations.
	// we are pre calculating number of different ways of climbing expressed in modulo 2^P
	$cache = buildCache($MAX_RUNGS, $MIN_P, $MAX_P);
	// number of different ways of climbing to the top of the ladder in the form of modulo 2^P
	$combinationsModulo = array();
	for($i = 0; $i < $L; $i++)
	{
		$P = $B[$i];
		$combinations = $A[$i] + 1;
		$combinationsModulo[$i] = $cache[$P][$combinations];
	}
	return $combinationsModulo;
}
/**
 * Builds cache of different ways of climbing, for every modulo P,
 * from Fibonacci input 0 to maximum number of rungs + 1 in array $A.
 *
 * @param $MAX_RUNGS Maximum number of rungs in array $A
 * @param $MIN_P Minimum modulo P
 * @param $MAX_P Maximum modulo P
 *
 * @return $cache array[P][climb_combinations_for_number_of_rungs]
 */
function buildCache($MAX_RUNGS, $MIN_P, $MAX_P)
{
	$cache = array();
	// iterating for every modulo P
	for($P = $MIN_P; $P <= $MAX_P; $P++)
	{
		$modulo = pow(2, $P);
		$cache[$P][0] = 0;
		$cache[$P][1] = 1;
		// number of different ways of climbing to the top of the ladder with N rungs is Fibonacci(N+1) combinations
		for($i = 2; $i <= $MAX_RUNGS + 1; $i++)
			$cache[$P][$i] = ($cache[$P][$i - 1] + $cache[$P][$i - 2]) % $modulo;
	}
	return $cache;
}


?>
