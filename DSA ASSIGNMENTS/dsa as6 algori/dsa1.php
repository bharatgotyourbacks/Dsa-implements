<?php

// 1)Extract all the digits of a given number, and print them

function printDigits($n)
{
    while ($n > 0) {
        $digit = $n % 10;
        print($digit . PHP_EOL);

        $n = intval($n / 10);
    }
}

printDigits(76854);

// 2)Reverse a given number without using recursion.

function numReverse($n)
{
    $rev = 0;
    while ($n > 0) {
        $digit = $n % 10;
        $rev = $rev * 10 + $digit;

        $n = intval($n / 10);
    }

    return $rev;
}

print("The reverse of 432 is " . numReverse(432) . PHP_EOL);
