<?php

function solution($S)
{
	// last open bracket must be closed first (LIFO), first open bracket must be closed last;
	// does this remind you on stack data structure ?
	// this array will be manipulated as stack data structure
	$stack = array();
	// convert brackets string to a brackets array
	$brackets = str_split($S);
	// opening and closing brackets, keys are given by bracket type
	$opening = array(3 => '{', 2 => '[', 1 => '(');
	$closing = array(1 => ')', 2 => ']', 3 => '}');
	foreach($brackets as $bracket) 
	{
		// opening brackets are always pushed to the stack
		if(in_array($bracket, $opening))
			array_push($stack, $bracket);
		// closing brackets are popped out of the stack only if brackets structure is correct
		elseif(in_array($bracket, $closing))
		{
			// if there are no opening brackets, and first bracket is closing
			if(empty($stack))
				return 0;
			$stackTop = end($stack);
			// stack top bracket type must be opening
			$stackTopBracketType = array_search($stackTop, $opening);
			// current bracket type is closing
			$currentBracketType = array_search($bracket, $closing);
			// if opening and closing bracket are of the same type
			if($stackTopBracketType === $currentBracketType)
				array_pop($stack);
			// if opening and closing bracket are not of the same type
			else
				return 0;
		}
	}
	// if bracket structure is correct, stack is empty
	if(count($stack) === 0)
		return 1;
	else
		return 0;
}

$S =  "{[()()]}";
echo solution($S);


?>
