<?php

function solution($A)
{
	// passing cars counter
	$passingCars = 0;
	// counter for cars going east
	$eastCounter = 0;
	for($i = 0; $i < count($A); $i++)
	{
		// if car is going east
		if($A[$i] === 0)
			$eastCounter++;
		// if car is going west, it passed over with every car which was going east till now
		elseif($A[$i] === 1)
			$passingCars += $eastCounter;
		if($passingCars > 1000000000)
			return -1;		
	}
	
	return $passingCars;
}


$A = array("0","1","0","1","1");
echo solution($A);

?>