<?php

function solution($A) 
{
	// we sort array $A in ascending order from minimum to maximum integer
	sort($A);
	// 3 biggest positive integers, if they exist, 0 which is neutral number is also included
	$max3PositiveInclZero = array();
	// 3 biggest negative integers, if they exist (three smallest absolute negative integers)
	$max3Negative = array();
	// 2 smallest negative integers, if they exist (two biggest absolute negative integers)
	$min2Negative = array();
	// if there are positive integers, we get 3 biggest
	for($i = count($A) - 1; $i >= count($A) - 3; $i--)
		if($A[$i] >= 0)
			$max3PositiveInclZero[] = $A[$i];
	// if there are no positive integers, we get 3 biggest negative integers
	if(count($max3PositiveInclZero) === 0)
	{
		for($i = count($A) - 1; $i >= count($A) - 3; $i--)
			if($A[$i] < 0)
				$max3PositiveInclZero[] = $A[$i];
	}
	// if there are positive integers, we get 2 smallest negative integers if they exist
	else
	{
		for($i = 0; $i <= 1; $i++) 
			if($A[$i] < 0)
				$min2Negative[] = $A[$i];
	}
	// maximal product of any triplet
	$maxProduct = null;
	// array which contains all relevant integers for maximal product of triplets combinations
	$r = array_merge($min2Negative, $max3Negative, $max3PositiveInclZero);
	for($i = 0; $i < count($r); $i++)
		for($j = $i + 1; $j < count($r); $j++)
			for($k = $j + 1; $k < count($r); $k++)
			{
				$currentProduct = $r[$i] * $r[$j] * $r[$k];
				if(empty($maxProduct) || $currentProduct > $maxProduct)
					$maxProduct = $currentProduct;
			}
	return $maxProduct;
}


$A = array("-3","1","2","-2","5","6");

echo solution($A)
?>
