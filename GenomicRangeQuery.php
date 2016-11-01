<?php

function solution($S, $P, $Q)
{
	// mapping between nucleotides and impact factor
	$sequenceMapping = array(1 => 'A', 2 => 'C', 3 => 'G', 4 => 'T');
	// string $S mapped to DNA impact factors array on each nucleotide position,
	// this enables us to know nucleotide repetitions from DNA start to every position
	$DNAImpactFactors = array();
	// $DNAImpactFactors first nucleotide initialization
	for($j = 1; $j <= count($sequenceMapping); $j++)
	{
		$DNAImpactFactors[0][$j] = $S[0] === $sequenceMapping[$j] ? 1 : 0;
		$DNAImpactFactors[0][$j] = $S[0] === $sequenceMapping[$j] ? 1 : 0;
		$DNAImpactFactors[0][$j] = $S[0] === $sequenceMapping[$j] ? 1 : 0;
		$DNAImpactFactors[0][$j] = $S[0] === $sequenceMapping[$j] ? 1 : 0;
	}
	// mapping string $S to DNA impact factors array on each nucleotide position
	for($i = 1; $i < strlen($S); $i++)
	{
		for($j = 1; $j <= count($sequenceMapping); $j++)
		{
			$DNAImpactFactors[$i][$j] = $DNAImpactFactors[$i - 1][$j];
			// increase count of nucleotide which appeared in DNA sequence
			if($S[$i] === $sequenceMapping[$j])
				$DNAImpactFactors[$i][$j] += 1;
		}
	}
	// minimum nucleotides impact factor in some DNA sequence 
	$minSequenceImpact = array();
	// both arrays P and Q have M queries 
	$M = count($P);
	// iterating through queries
	for($i = 0; $i < $M; $i++)
	{
		// iterating through impact factors, from minimum to maximum
		// when we find lowest impact factor for some DNA sequence, we stop searching in that sequence
		for($j = 1; $j <= count($sequenceMapping); $j++)
		{
			// we want to include nucleotide count change on sequence start also
			$sequenceStartImpactFactors = isset($DNAImpactFactors[$P[$i] - 1])
				? $DNAImpactFactors[$P[$i] - 1][$j] : 0;
			$sequenceEndImpactFactors = $DNAImpactFactors[$Q[$i]][$j];	
			// if end DNA sequence nucleotide count is bigger than begin DNA sequence nucleotide count
			if($sequenceEndImpactFactors > $sequenceStartImpactFactors)
			{
				$minSequenceImpact[$i] = $j;
				break;
			}
		}
	}
	echo implode($minSequenceImpact);
	return $minSequenceImpact;
}

$S = "CAGCCTA";
$P = array("2","5","0");
$Q = array("4","5","6");

solution($S, $P, $Q)
?>
