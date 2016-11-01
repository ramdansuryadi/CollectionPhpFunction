<?php

function solution($N){
	
$N = (string)decbin($N);
	$count = 0;
	$print = 0;
	for($i=0; $i <= strlen($N); $i++){
		$data = (bool)substr($N, $i, 1);
		if(!$data){
			$count++;
		}else{
			if ($count > $print){
				$print = $count;
			}
			$count = 0;
		}
	}
	return $print;
}
echo solution(9);
?>