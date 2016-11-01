<?php

function solution($A)
{
	// we'll count repetitions, integer which is not repeated is unpaired element
	$integerCount = array();
	foreach($A as $value)
	{
		if(!isset($integerCount[$value]))
			$integerCount[$value] = 0;
		$integerCount[$value]++;
		// if we have pair, we can remove it so only unpaired element will remain in the array
		if($integerCount[$value] == 2)
			unset($integerCount[$value]);
	}
	$unpaired = key($integerCount);
	return $unpaired;
}

$A = array("9","3","9","3","9","7","9");
echo solution($A);

?>
