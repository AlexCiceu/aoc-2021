<?php

$input = ''; // Challenge input
$array = preg_split("/\r\n|\n|\r/", $input);

// Part A
$depth = 0;
$hPos = 0;

foreach($array as $el) {
    $value = (int) preg_replace('/[^0-9]/', '', $el);
    switch($el){
        case strpos($el, 'up') !== false:
            $depth -= $value;
            break;
        case strpos($el, 'down') !== false:
            $depth += $value;
            break;
        case strpos($el, 'forward') !== false:
            $hPos += $value;
            break;
    }
}
var_dump($depth * $hPos);

// Part B
$depth = 0;
$hPos = 0;
$aim = 0;

foreach($array as $el) {
    $value = (int) preg_replace('/[^0-9]/', '', $el);
    switch($el){
        case strpos($el, 'up') !== false:
            $aim -= $value;
            break;
        case strpos($el, 'down') !== false:
            $aim += $value;
            break;
        case strpos($el, 'forward') !== false:
            $hPos += $value;
            $depth +=  $value * $aim;
            break;
    }
}
var_dump($depth * $hPos);

