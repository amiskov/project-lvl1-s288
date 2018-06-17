<?php
namespace BrainGames\BrainBalance;

use function BrainGames\Gameplay\startNewGame;

const MIN = 100;
const MAX = 9999;
const DESCRIPTION = 'Balance the given number.';

function isDigitsBalanced(array $digits): bool
{
    return max($digits) - min($digits) <= 1 && isDigitsOrderRight($digits);
}

function isDigitsOrderRight(array $digits): bool
{
    if (empty($digits)) {
        return true;
    }

    $lastDigit = array_pop($digits);
    $penultimateDigit = $digits[count($digits) - 1];

    return $lastDigit >= $penultimateDigit && isDigitsOrderRight($digits);
}

function balanceDigits(array $digits): array
{
    if (isDigitsBalanced($digits)) {
        return $digits;
    }

    $max = max($digits);
    $min = min($digits);

    $lastMinPosition = max(array_keys($digits, $min));
    $firstMaxPos = array_search($max, $digits);

    $digits[$firstMaxPos] = $max - 1;
    $digits[$lastMinPosition] = $min + 1;

    return balanceDigits($digits);
}

function balanceNumber(int $number): int
{
    $digits = str_split($number);

    if (isDigitsBalanced($digits)) {
        return $number;
    }

    return (int) join('', balanceDigits($digits));
}

function run()
{
    $getGameData = function () {
        $question = rand(MIN, MAX);

        return [
            'question' => $question,
            'answer' => balanceNumber($question)
        ];
    };

    return startNewGame(DESCRIPTION, $getGameData);
}
