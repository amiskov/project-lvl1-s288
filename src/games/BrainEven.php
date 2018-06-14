<?php
namespace BrainGames\BrainEven;

use function BrainGames\Cli\getUserAnswer;
use function BrainGames\Cli\showRoundResults;
use function BrainGames\utils\getRandomNumber;

const POSITIVE_ANSWER = "yes";
const NEGATIVE_ANSWER = "no";

function getGameInfo()
{
    return [
        'ns' => __NAMESPACE__,
        'description' => "Answer %B" . POSITIVE_ANSWER . "%n if number is even otherwise answer %B". NEGATIVE_ANSWER . "%n."
    ];
}

function startRound($userName)
{
    $question = getRandomNumber();

    $userAnswer = getUserAnswer($question);
    $correctAnswer = getCorrectAnswer($question);

    return showRoundResults($userName, $userAnswer, $correctAnswer);
}

function getCorrectAnswer($question)
{
    $isEven = $question % 2 === 0;
    return $isEven ? POSITIVE_ANSWER : NEGATIVE_ANSWER;
}
