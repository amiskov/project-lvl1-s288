<?php

namespace BrainGames\Gameplay;

use function \cli\line;
use function \cli\prompt;

const WELCOME_MSG = "%W%4 Welcome to the Brain Games! %n";
const FAIL_MSG = "\"%s\" is wrong answer :( Correct answer was \"%s\".\nLet's try again, %s!";
const WIN_MSG = "%GCorrect!%n";
const ATTEMPTS = 3;

function startNewGame(string $gameDescription, \Closure $getGameData)
{
    line(WELCOME_MSG . PHP_EOL . $gameDescription . PHP_EOL);
    $userName = prompt('May I have your name?', false, ' ');
    line("Hello, {$userName}!\n");

    $roundsCount = 0;
    for ($i = 1; $i <= ATTEMPTS; $i++) {
        ['question' => $question, 'answer' => $correctAnswer] = $getGameData();

        line("Question: {$question}");
        $userAnswer = prompt("Your answer");

        if ($userAnswer !== $correctAnswer) {
            return line(sprintf(FAIL_MSG, $userAnswer, $correctAnswer, $userName));
        }

        line(WIN_MSG);
        $roundsCount += 1;
    }

    line("%W%2 Congratulations, {$userName}! %n");
}
