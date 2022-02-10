<?php

//1)WAP to define a recursive function

function factorial($num)
{
    if ($num == 0) {
        return 1;
    }
    return $num * factorial($num - 1);
}

$factorial = factorial(5);
print("Factorial = " . $factorial . "\n");

//2)Check if a given number is palindrome number or not.
//A palindrome number is a number that is same after reverse. For example,121, 34543, 343, 131, 48984 are the palindrome numbers



function checkPallindrome($num)
{
    $reverse = numReverse($num);

    return $num == $reverse ? "Yes" : "No";
}

print("Is 121 pallindrome? " . checkPallindrome(121) . PHP_EOL);
print("Is 34543 pallindrome? " . checkPallindrome(34543) . PHP_EOL);

//3)WAP to reverse a number.

function numReverse($n, $rev = 0)
{
    if ($n > 0) {
        $digit = $n % 10;
        $rev = $rev * 10 + $digit;

        $rev = numReverse(intval($n / 10), $rev);
    }

    return $rev;
}
print("The reverse of 751 is " . numReverse(563) . PHP_EOL);


