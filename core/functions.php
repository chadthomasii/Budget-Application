<?php

function calculatePercentages($totalAmount, $percent)
{
    return number_format(($percent * $totalAmount) / 100, 2);
}

function twoNumberPercent($small, $big)
{   
    $new = $small * 100;
    $passed = $new / $big;

    return number_format($passed, 0);
}