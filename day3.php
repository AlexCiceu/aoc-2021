<?php

$input = ''; // Challenge input
$array = preg_split("/\r\n|\n|\r/", $input);

// Part A
$gamma = [];
$epsilon = [];

$aStack = [];
$bStack = [];

for($i = 0; $i < strlen($array[0]); $i++) {
    foreach($array as $el){
        $bit = (int) $el[$i];
        if($bit === 0) {
            $aStack[] = $bit;
        } else {
            $bStack[] = $bit;
        }
    }
        $gamma[] = count($aStack) > count($bStack) ? 0 : 1;
        $epsilon[] = count($aStack) > count($bStack) ? 1 : 0;

        $aStack = [];
        $bStack = [];
}
$decodedGamma = bindec(implode($gamma));
$decodedEpsilon = bindec(implode($epsilon));

var_dump($decodedGamma * $decodedEpsilon);

// Part B
$gammaStack = $array;
$epsilonStack = $array;

$gammaStackShallow = [];
$epsilonStackShallow = [];

$aStack = [];
$bStack = [];

for($i = 0; $i < strlen($array[0]); $i++) {
    foreach($gammaStack as $el) {
        $bit = (int) $el[$i];
        if($bit === 0) {
            $aStack[] = $bit;
        } else {
            $bStack[] = $bit;
        }
    }
    if(count($gammaStack) > 1){
        if(count($bStack) >= count($aStack)){
            foreach($gammaStack as $o) {
                if((int)$o[$i] === 1) {
                    $gammaStackShallow[] = $o;
                }
            }
        } else {
            foreach($gammaStack as $o) {
                if((int)$o[$i] === 0) {
                    $gammaStackShallow[] = $o;
                }
            }
        }
        $gammaStack = $gammaStackShallow;
        $gammaStackShallow = []; 
    }
    $aStack = [];
    $bStack = [];
}

for($i = 0; $i < strlen($array[0]); $i++) {
    foreach($epsilonStack as $el) {
        $bit = (int) $el[$i];
        if($bit === 0) {
            $aStack[] = $bit;
        } else {
            $bStack[] = $bit;
        }
    }
    if(count($epsilonStack) > 1) {
        if(count($bStack) < count($aStack)){
            foreach($epsilonStack as $o) {
                if((int)$o[$i] === 1) {
                    $epsilonStackShallow[] = $o;
                }
            }
        } else{
            foreach($epsilonStack as $o) {
                if((int)$o[$i] === 0) {
                     $epsilonStackShallow[] = $o;
                }
            }
        }
        $epsilonStack = $epsilonStackShallow;
        $epsilonStackShallow = []; 
    }
    $aStack = [];
    $bStack = [];
}

$decodedGamma = bindec(implode($gammaStack));
$decodedEpsilon = bindec(implode($epsilonStack));
var_dump($decodedGamma * $decodedEpsilon);
