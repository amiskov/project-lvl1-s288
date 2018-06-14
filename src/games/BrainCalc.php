<?php
namespace BrainGames\BrainCalc;

use function BrainGames\Cli\showRoundResults;
use function BrainGames\Cli\getUserAnswer;
use function BrainGames\utils\getRandomNumber;

const OPERATIONS = ['+', '-', '*'];

function getGameInfo()
{
    return [
        'ns' => __NAMESPACE__,
        'description' => 'What is the result of the expression?'
    ];
}

function getRandomOperation()
{
    return OPERATIONS[rand(0, count(OPERATIONS) - 1)];
}

function startRound($userName)
{
    $question = getRandomNumber() . getRandomOperation() . getRandomNumber();

    $userAnswer = getUserAnswer($question);
    $correctAnswer = eval("return $question;");

    return showRoundResults($userName, $userAnswer, $correctAnswer);
}
