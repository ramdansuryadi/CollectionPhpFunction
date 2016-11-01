<?php

function solution($A) 
{
	$N = count($A) + 1;
	$sumIncludingMissingNumber = ((float)$N * ($N + 1)) / 2;
	$sumWithoutMissingNumber = (float)0;
	foreach($A as $number) 
		$sumWithoutMissingNumber += $number;
	$missingNumber = (int)($sumIncludingMissingNumber - $sumWithoutMissingNumber);
	return $missingNumber;
}

$A = array("2","3","1","5");
echo solution($A);


?>