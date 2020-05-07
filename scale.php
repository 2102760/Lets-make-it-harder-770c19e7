<?php

if (!isset($argv[1]) || !is_numeric($argv[1])) {
    exit('WeightLeft is not entered or is not numeric.');
} else {
    if (!isset($argv[2]) || !is_numeric($argv[2])) {
        exit('WeightRight is not entered or is not numeric.');
    } else {
        if (!isset($argv[3])) {
            exit('WeightOption is not entered');
        }
    }
}

$possible = false;

$weightLeft = (int)$argv[1];
$weightRight = (int)$argv[2];
$weightOptional = explode(',', $argv[3]);

$lowestWeight = min($weightLeft, $weightRight);
$heightsWeight = max($weightLeft, $weightRight);

$differenceWeight = $heightsWeight - $lowestWeight;

$solutionWeight = null;

foreach ($weightOptional as $weight) {
    $weight = (int)$weight;
    if ($weight === $differenceWeight) {
        $solutionWeight = $weight;
        $possible = true;
    } else {
        foreach ($weightOptional as $weight2) {
            $weight2 = (int)$weight2;
            if ($weight2 + $weight === $differenceWeight) {
                $solutionWeight = $weight . ', ' . $weight2;
                $possible = true;
            } else {
                foreach ($weightOptional as $weight3) {
                    $weight3 = (int)$weight3;
                    if ($weight3 + $weight2 + $weight === $differenceWeight) {
                        $solutionWeight = $weight . ', ' . $weight2 . ', ' . $weight3;
                        $possible = true;
                    }
                }
            }
        }
    }
}

if ($possible) {
    echo('I found a solution with the following weight: ' . $solutionWeight);
} else {
    echo('I did not find a solution');
}