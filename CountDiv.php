<?php

function solution($A, $B, $K)
{
	// divisible integers count
	$divisibleIntegers = 0;
	// number of divisible integers by K from 0 to A
	$divisibleToLimitA = floor($A / $K);
	// number of divisible integers by K from 0 to B
	$divisibleToLimitB = floor($B / $K);
 	// if A is divisible by K
	if($A % $K === 0)
		$divisibleIntegers = $divisibleToLimitB - $divisibleToLimitA + 1;
	// if A is not divisible by K
	else
		$divisibleIntegers = $divisibleToLimitB - $divisibleToLimitA;
	return (int)$divisibleIntegers;
}

$A = 6;
$B = 11;
$K = 2;

echo solution($A, $B, $K);
?>
