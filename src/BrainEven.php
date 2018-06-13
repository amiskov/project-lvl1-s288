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
const ALLOWED_ATTEMPTS = 3;

function run()
{
    greet("Answer %B" . POSITIVE_ANSWER . "%n if number is even otherwise answer %B" . NEGATIVE_ANSWER . "%n.");
    $userName = getUserName();
    $roundsCount = 0;

    for ($i = 1; $i <= ALLOWED_ATTEMPTS; $i++) {
        $isUserWon = startNewRound($userName);

        if (!$isUserWon) {
            break;
        }

        $roundsCount += 1;
    }

    if ($roundsCount === ALLOWED_ATTEMPTS) {
        line("%W%2 Congratulations, {$userName}! %n");
    }
}

function startNewRound($userName)
{
    $question = rand(MAX, MIN);
    $userAnswer = getUserAnswer($question);
    $correctAnswer = getCorrectAnswer($question);
    $isAnswerCorrect = $userAnswer === $correctAnswer;

    if ($isAnswerCorrect) {
        line("%GCorrect!%n");
    } else {
        line("\"%R{$userAnswer}%n\" is wrong answer :( Correct answer was \"%G{$correctAnswer}%n\".");
        line("Let's try again, $userName!");
    }

    return $isAnswerCorrect;
}

function getCorrectAnswer($question)
{
    $isEven = $question % 2 === 0;
    return $isEven ? POSITIVE_ANSWER : NEGATIVE_ANSWER;
}

function getUserAnswer($question)
{
    line("Question: {$question}?");
    return prompt("Your answer", $marker = '');
}
