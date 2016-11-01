<?php

function solution($A)
{
	// sorting array $A from lowest to highest integer
	sort($A);
	// number of triangles initialization
	$triangles = 0;
	// array $A number of elements
	$N = count($A);
	for($i = 0; $i < $N - 2; $i++)
	{
		$k = 0;
		for($j = $i + 1; $j < $N - 1; $j++)
		{
			// while we haven't reached end, and triplet is triangular 
			// (array $A is sorted, and $A[$k] is highest value, so other two triangular conditions are also matched)
			while($k < $N && ($A[$i] + $A[$j]) > $A[$k])
				// when increasing the value of $j, we can increase (as far as possible) the value of $k	
				$k += 1;
			$triangles += $k - $j - 1;
		}
	}
	return $triangles;
}

?>
