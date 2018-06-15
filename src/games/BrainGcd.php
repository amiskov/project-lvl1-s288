<?php
namespace BrainGames\BrainGcd;

use function BrainGames\Gameplay\startNewGame;

const MIN = 1;
const MAX = 100;
const DESCRIPTION = "Find the greatest common divisor of given numbers.";

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}

function run()
{
    $question = function () {
        $num1 = rand(MIN, MAX);
        $num2 = rand(MIN, MAX);

        return "{$num1} {$num2}";
    };

    $answer = function ($question) {
        [$num1, $num2] = explode(" ", $question);
        return gcd($num1, $num2);
    };

    startNewGame(DESCRIPTION, $question, $answer);
}
