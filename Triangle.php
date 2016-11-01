<?php

function solution($A) 
{

	sort($A);
	$N = count($A);
	$arrayEnd = false;
	// while we haven't reached array end
	while(!$arrayEnd)
	{
		$P = key($A);
		// advance the internal array pointer of an array
		next($A);
		$Q = key($A);
		next($A);
		$R = key($A);
		// if $Q and $R exist, we haven't reached array $A end
		if($Q !== NULL && $R !== NULL)
		{
			// rewind the internal array pointer 1 place back
			prev($A);
			// if triangular conditions are matched
			if($A[$P] + $A[$Q] > $A[$R] && $A[$Q] + $A[$R] > $A[$P] && $A[$R] + $A[$P] > $A[$Q])
				return 1;
		}
		else
			$arrayEnd = true;
	}
	return 0;
}


$A = array("10","2","5","1","8","20");

echo solution($A)
?>
