<?php

$input = ''; // Challenge input
$array = preg_split("/\r\n|\n|\r/", $input);

// Part A
$solutionA = 0;
for($i = 0; $i < count($array) - 1; $i++) {
    if($array[$i+1] > $array[$i]){
        $solutionA += 1;
    }
}
var_dump($solutionA);

// Part B
$solutionB = 0;
for($i = 0; $i < count($array) - 3; $i++) {
    $windowA = $array[$i] + $array[$i + 1] + $array[$i + 2];
    $windowB = $array[$i + 1] + $array[$i + 2] + $array[$i + 3]; 
    
    if($windowB > $windowA){
        $solutionB += 1;
    }
}
var_dump($solutionB);
