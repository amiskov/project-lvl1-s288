<?php
namespace BrainGames\BrainGcd;

use function BrainGames\Cli\showRoundResults;
use function BrainGames\Cli\getUserAnswer;
use function BrainGames\utils\getRandomNumber;

function getGameInfo()
{
    return [
        'ns' => __NAMESPACE__,
        'description' => 'Find the greatest common divisor of given numbers.'
    ];
}

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}

function startRound($userName)
{
    $num1 = getRandomNumber();
    $num2 = getRandomNumber();

    $question = "{$num1} {$num2}";

    $userAnswer = getUserAnswer($question);
    $correctAnswer = gcd($num1, $num2);

    return showRoundResults($userName, $userAnswer, $correctAnswer);
}
