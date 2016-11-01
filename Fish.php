<?php

function solution($A, $B)
{
	$aliveFishCounter = 0;
	// fish that flows downstream
	$downstreamFish = array();
	for($i = 0; $i < count($A); $i++)
	{
		// if fish flows downstream
		if($B[$i] === 1)
			$downstreamFish[$i] = $A[$i];
		// if fish flows upstream
		else
		{
			// tracks whether current $A[$i] fish is eaten
			$currentFishEaten = false;
			// if there is downstream fish, and current fish is not eaten
			while(count($downstreamFish) != 0 && $currentFishEaten === false)
			{
				// position/key of nearest downstream fish
				end($downstreamFish);
				$dfp = key($downstreamFish);
				// if upstream fish is bigger than the downstream fish
				if($A[$i] > $downstreamFish[$dfp])
					unset($downstreamFish[$dfp]);
				// if upstream fish is smaller than the downstream fish
				else
					$currentFishEaten = true;
			}
			// if there is no downstream fish in front of upstream fish, upstream fish stays alive
			if(count($downstreamFish) === 0)
				$aliveFishCounter++;
		}
	}
	// if some downstream fish survived
	$aliveFishCounter += count($downstreamFish);
	return $aliveFishCounter;
}

$A = array("4","3","2","1","5");
$B = array("0","1","0","0","0");

echo solution($A, $B);


?>
