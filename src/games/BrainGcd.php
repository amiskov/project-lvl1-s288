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
    $getGameData = function () {
        $question = [rand(MIN, MAX), rand(MIN, MAX)];

        return [
            'question' => join(" ", $question),
            'answer' => gcd(...$question)
        ];
    };

    startNewGame(DESCRIPTION, $getGameData);
}
