<?php

function calculatePercentages($totalAmount, $percent)
{
    return number_format(($percent * $totalAmount) / 100, 2);
}