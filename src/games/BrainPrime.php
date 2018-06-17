<?php
namespace BrainGames\BrainPrime;

use function BrainGames\Gameplay\startNewGame;

const MIN = 1;
const MAX = 100;
const POSITIVE_ANSWER = "yes";
const NEGATIVE_ANSWER = "no";
const DESCRIPTION = "Answer \"" . POSITIVE_ANSWER . "\" if number is prime otherwise answer \"". NEGATIVE_ANSWER . "\"";

function isPrime($num)
{
    if ($num <= 1) {
        return false;
    }

    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

function run()
{
    $getGameData = function () {
        $question = rand(MIN, MAX);

        return [
            'question' => $question,
            'answer' => isPrime($question) ? POSITIVE_ANSWER : NEGATIVE_ANSWER
        ];
    };

    return startNewGame(DESCRIPTION, $getGameData);
}
