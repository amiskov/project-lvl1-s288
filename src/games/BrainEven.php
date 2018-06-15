<?php
namespace BrainGames\BrainEven;

use function BrainGames\Gameplay\startNewGame;

const MIN = 1;
const MAX = 100;
const POSITIVE_ANSWER = "yes";
const NEGATIVE_ANSWER = "no";
const DESCRIPTION = "Answer %B" . POSITIVE_ANSWER . "%n if number is even otherwise answer %B". NEGATIVE_ANSWER . "%n.";

function run()
{
    $question = function () {
        return rand(MIN, MAX);
    };

    $answer = function ($question) {
        return $question % 2 == 0 ? POSITIVE_ANSWER : NEGATIVE_ANSWER;
    };

    return startNewGame(DESCRIPTION, $question, $answer);
}
