<?php

function solution($A)
{
	// minimal price is initialized to the first day price
	$minPrice = $A[0];
	$maxProfit = 0;
	// iteration starts from seconds day, because we must at least 2 market prices
	for($i = 1; $i < count($A); $i++)
	{
		// checking if we have new market bottom price for given number of days
		if($A[$i] < $minPrice)
			$minPrice = $A[$i];
		// maximum profit is equal to maximum price difference between 2 dates in some period
		if($A[$i] - $minPrice > $maxProfit)
			$maxProfit = $A[$i] - $minPrice;
	}
	return $maxProfit;
}

$A = array("23171","21011","21123","21366","21013","21367");

echo solution($A);

?>
