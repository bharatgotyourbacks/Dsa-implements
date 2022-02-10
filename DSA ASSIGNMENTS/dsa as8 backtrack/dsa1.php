<?php
// Knight’s Tour-Given a N*N board with the Knight placed on the first block of an empty board. Moving according to the rules of chess knight must visit each square exactly once. Print the order of each cell in which they are visited
define("N", 8);

/**
 * A utility function to check if x, y are valid indices for N*N chess board
 *
 * @param integer $x
 * @param integer $y
 * @param array $solution
 * @return boolean
 */
function isSafe(int $x, int $y, array $solution): bool
{
    return ($x >= 0 && $x < N && $y >= 0 && $y < N && $solution[$x][$y] == -1);
}

/**
 * An utility function to print the N*N solution matrix
 *
 * @param array $solution
 * @return void
 */
function printTour(array $solution)
{
    for ($x = 0; $x < N; $x++) {
        for ($y = 0; $y < N; $y++) {
            print($solution[$x][$y] + " ");
        }
        print(PHP_EOL);
    }
}

function solveKTUtil(int $x, int $y, int $moveCount, array $solution, array $xMoves, array $yMoves): bool
{
    for ($k = 0; $k < N; $k++) {
        $next_x = $x + $xMoves[$k];
        $next_y = $y + $yMoves[$k];

        if (isSafe($next_x, $next_y, $solution)) {
            $solution[$next_x][$next_y] = $moveCount;
            if (solveKTUtil($next_x, $next_y, $moveCount + 1, $solution, $xMoves, $yMoves)) {
                return true;
            } else {
                $solution[$next_x][$next_y] = -1; // backtracking
            }
        }
    }
    return false;
}

function solveKTByBackktracking()
{
    // Creating the solution 2D array
    $solution = array();
    for ($i = 0; $i < N; $i++) {
        $solution[$i] = array();
    }

    // Initialisation of the solution matrix
    for ($x = 0; $x < N; $x++) {
        for ($y = 0; $y < N; $y++) {
            $solution[$x][$y] = -1;
        }
    }

    // Marking the starting position of the knight on the chess board
    $solution[0][0] = 0;

    /* xMoves[] and yMoves[] define all the possible ways the knight can move next */
    // xMoves[] is for all the possible moves of the knight along the x-asis (in horizontal direction)
    $xMoves = [2, 1, -1, -2, -2, -1, 1, 2];
    // xMoves[] is for all the possible moves of the knight along the y-asis (in vertical direction)
    $yMoves = [1, 2, 2, 1, -1, -2, -2, -1];

    // Start from 0, 0 and explore all possible tours using solveKTUtil()
    if (!solveKTUtil(0, 0, 1, $solution, $xMoves, $yMoves)) {
        return false;
    }

    printTour($solution);
    return true;
}

if (solveKTByBackktracking()) {
    print("Knight's tour exists :)\n");
} else {
    print("Knight's tour does not exist! :(\n");
}
//2.N-Queen’s Problem-Then-queenspuzzle is the problem of placingnqueens on ann x nchessboard such that no two queens attack each other.Given an integern, returnall distinct solutions to then-queens puzzle. You may return the answer inany order.Each solution contains a distinct board configuration of the n-queens' placement, where'Q'and'.'both indicate a queen and an empty space, respectively


function PrintSolution(&$board)
{
    global $N;

    for ($i = 0; $i < $N; ++$i)
    {
        for ($j = 0; $j < $N; ++$j)
            echo " " . $board[$i][$j] . " ";

        echo "<br/>";
    }
}

function IsSafer(&$board, $row, $col)
{
    global $N;
    $i; $j;

    for ($i = 0; $i < $col; ++$i)
        if ($board[$row][$i])
            return false;

    for ($i = $row, $j = $col; $i >= 0 && $j >= 0; --$i, --$j)
        if ($board[$i][$j])
            return false;

    for ($i = $row, $j = $col; $j >= 0 && $i < $N; ++$i, --$j)
        if ($board[$i][$j])
            return false;

    return true;
}

function SolveNQ(&$board, $col)
{
    global $N;

    if ($col >= $N)
        return true;

    for ($i = 0; $i < $N; ++$i)
    {
        if (IsSafer($board, $i, $col))
        {
            $board[$i][$col] = 1;

            if (SolveNQ($board, $col + 1))
                return true;

            $board[$i][$col] = 0;
        }
    }

    return false;
}

function Solve()
{
    $board = array(
        array(0, 0, 0, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 0, 0, 0),
    );

    if (SolveNQ($board, 0) == false)
        return false;

    PrintSolution($board);
    return true;
}
$N = Readline("Enter N Value");
$is_solved = Solve();


