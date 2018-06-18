<?php
namespace BrainGames\BrainBalance;

use function BrainGames\Gameplay\startNewGame;

const MIN = 1;
const MAX = 9999;
const DESCRIPTION = 'Balance the given number.';

function isDigitsBalanced(array $digits): bool
{
    $sorted = $digits;
    sort($sorted);

    return max($digits) - min($digits) <= 1 && $sorted === $digits;
}

function balanceDigits(string $strNum): string
{
    $digits = str_split($strNum);

    while (!isDigitsBalanced($digits)) {
        $max = max($digits);
        $min = min($digits);

        $lastMinPosition = max(array_keys($digits, $min));
        $firstMaxPos = array_search($max, $digits);

        $digits[$firstMaxPos] = $max - 1;
        $digits[$lastMinPosition] = $min + 1;
    }

    return join('', $digits);
}

function run()
{
    $getGameData = function () {
        $question = str_pad(rand(MIN, MAX), strlen(MAX), '0', STR_PAD_LEFT);

        return [
            'question' => $question,
            'answer' => balanceDigits($question)
        ];
    };

    return startNewGame(DESCRIPTION, $getGameData);
}
