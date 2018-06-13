<?php
namespace BrainGames\BrainEven;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\greet;
use function BrainGames\Cli\getUserName;

const POSITIVE_ANSWER = "yes";
const NEGATIVE_ANSWER = "no";
const MIN = 1;
const MAX = 100;

function run()
{
    greet("Answer %B" . POSITIVE_ANSWER . "%n if number is even otherwise answer %B" . NEGATIVE_ANSWER . "%n.");
    $userName = getUserName();

    $attempts = 3;
    while ($attempts >= 1) {
        $isUserWon = startNewGame($userName);

        if (!$isUserWon) {
            break;
        }

        $attempts -= 1;
    }

    if ($attempts === 0) {
        line("%W%2 Congratulations, {$userName}! %n");
    }
}

function startNewGame($userName)
{
    $number = rand(MAX, MIN);
    $answer = getUserAnswer($number);
    $isAnswerCorrect = $answer === getCorrectAnswer($number);

    if ($isAnswerCorrect) {
        line("%GCorrect!%n");
    } else {
        $correctAnswer = getCorrectAnswer($number);
        line("\"%R{$answer}%n\" is wrong answer :( Correct answer was \"%G{$correctAnswer}%n\".");
        line("Let's try again, $userName!");
    }

    return $isAnswerCorrect;
}

function getCorrectAnswer($number)
{
    $isEven = $number % 2 === 0;
    return $isEven ? POSITIVE_ANSWER : NEGATIVE_ANSWER;
}

function getUserAnswer($number)
{
    line("Question: {$number}?");
    return prompt("Your answer", $marker = '');
}
