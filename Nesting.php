<?php

function solution($S)
{

	$stack = array();
	// convert brackets string to a brackets array
	$brackets = str_split($S);
	foreach($brackets as $bracket) 
	{
		// opening brackets are always pushed to the stack
		if($bracket === '(')
			array_push($stack, $bracket);
		// closing brackets are popped out of the stack
		elseif($bracket === ')')
		{
			// if there are no opening brackets, and first bracket is closing
			if(empty($stack))
				return 0;
			array_pop($stack);
		}
	}
	// if bracket structure is correct, stack is empty
	if(count($stack) === 0)
		return 1;
	else
		return 0;
}

$S = "(()(())())";
echo solution($S);

?>
