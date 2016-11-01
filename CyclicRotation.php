<?php


function solution($A, $K)
{
	// shifted array
	$shifted = array();
	// number of elements
	$N = count($A);
	// if $K is bigger than $N, on $N-th shift we would be on starting position,
	// so it makes sense only to do smaller number of shifts than $N size
	$shiftedPositions = $K % $N;
	// initially first element position is 0, but at the end it will be K
	for($i = 0; $i < $N; $i++)
	{
		$position = $i + $shiftedPositions;
		if($position > $N - 1)
			$position = $position - $N;
		$shifted[$position] = $A[$i];
	}
	ksort($shifted);
	echo implode($shifted); 
	return $shifted;
}


$A = array("3","8","9","7","6");
$K = "3";

solution($A, $K);


?>
