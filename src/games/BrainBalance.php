<?php
namespace BrainGames\BrainCalc;

use function BrainGames\Cli\showRoundResults;
use function BrainGames\Cli\getUserAnswer;
use function BrainGames\utils\getRandomNumber;

function getGameInfo()
{
    return [
        'ns' => __NAMESPACE__,
        'description' => 'Balance the given number.'
    ];
}

function isBalanced($number)
{
    $digits = str_split($number);
    $max = max($digits);
    $min = min($digits);

    if ($max - $min > 1) {
        return false;
    }

    function checkIfBalanced($stack) {
        if($stack == []) {
            return true;
        }

        $lastDigit = array_pop($stack);
        $penultimateDigit = $stack[count($stack) - 1];

        return $lastDigit >= $penultimateDigit && checkIfBalanced($stack);
    }

    return checkIfBalanced($digits);
}

function balanceNumber($number)
{
    if (isBalanced($number)) {
        return $number;
    }

    $digits = str_split($number);

    function balanceNumberInner($digits) {
        $max = max($digits);
        $min = min($digits);
    }
}

function startRound($userName)
{
    $question = getRandomNumber();

    $userAnswer = getUserAnswer($question);
    $correctAnswer = balanceNumber($question);

    return showRoundResults($userName, $userAnswer, $correctAnswer);
}
