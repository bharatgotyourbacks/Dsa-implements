<?php
//1)Fibonacci Sequence-The Fibonacci numbers are the numbers in the following integer sequence.
//0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, ........Given a number n, print n-th Fibonacci Number.

function fibonacciNumber($n)
{
    if ($n <= 1) {
        return $n;
    }
    return fibonacciNumber($n - 1) + fibonacciNumber($n - 2);
}

$nThFibonacciNumber = fibonacciNumber(6);
print("n-th Fibonacci number = " . $nThFibonacciNumber . "\n");

// 2) 0/1 Knapsack-Given weights and values of n items, put these items in a knapsack of capacity W to get the maximum total value in the knapsack.
// In other words, given two integer arrays val[0..n-1] and wt[0..n-1] which represent values and weights associated with n items respectively. Also given an integer W which represents knapsack capacity, find out the maximum value subset of val[] such that sum of the weights of this subset is smaller than or equal to W.
// You cannot break an item, either pick the complete item or don’tpick it (0-1 property).
function knapSack($W, $wt, $val, $n)
{
    // Base Case
    if ($n == 0 || $W == 0)
        return 0;

    if ($wt[$n - 1] > $W)
        return knapSack($W, $wt, $val, $n - 1);

    // Return the maximum of two cases:
    // (1) nth item included
    // (2) not included
    else
        return max($val[$n - 1] +
            knapSack($W - $wt[$n - 1],
                $wt, $val, $n - 1),
            knapSack($W, $wt, $val, $n-1));
}

$val = [60, 100, 120];
$wt = [10, 20, 30];
$W = 50;
$n = count($val);
print knapSack($W, $wt, $val, $n);
