<?php

namespace BrainGames\Gameplay;

use function BrainGames\Cli\showMessage;
use function BrainGames\Cli\getUserInput;

const WELCOME_MSG = "%W%4 Welcome to the Brain Games! %n";
const FAIL_MSG = "\"%s\" is wrong answer :( Correct answer was \"%s\".\nLet's try again, %s!";
const WIN_MSG = "%GCorrect!%n";
const ATTEMPTS = 3;

function startNewGame(string $gameDescription, \Closure $getQuestion, \Closure $getCorrectAnswer)
{
    showMessage(WELCOME_MSG . PHP_EOL . $gameDescription . PHP_EOL);
    $userName = getUserInput('May I have your name?');
    showMessage("Hello, {$userName}!\n");

    $roundsCount = 0;

    for ($i = 1; $i <= ATTEMPTS; $i++) {
        $question = $getQuestion();
        showMessage("Question: {$question}");
        $userAnswer = getUserInput("Your answer");
        $correctAnswer = $getCorrectAnswer($question);

        if ($userAnswer != $correctAnswer) {
            showMessage(sprintf(FAIL_MSG, $userAnswer, $correctAnswer, $userName));
            break;
        }

        showMessage(WIN_MSG);
        $roundsCount += 1;
    }

    if ($roundsCount == ATTEMPTS) {
        showMessage("%W%2 Congratulations, {$userName}! %n");
    }

    return true;
}
