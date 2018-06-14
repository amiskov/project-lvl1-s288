<?php
namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

const ATTEMPTS = 3;

function run($gameNameSpace, $gameDescription)
{
    $userName = greet($gameDescription);
    $roundLauncher = $gameNameSpace . "\\startRound";

    $roundsCount = 0;

    for ($i = 1; $i <= ATTEMPTS; $i++) {
        $isUserWon = call_user_func($roundLauncher, $userName);

        if (!$isUserWon) {
            break;
        }

        $roundsCount += 1;
    }

    if ($roundsCount == ATTEMPTS) {
        line("%W%2 Congratulations, {$userName}! %n");
    }
}

function greet(string $gameDescription = '')
{
    line("%W%4 Welcome to the Brain Game! %n");
    line($gameDescription . PHP_EOL);

    $userName = prompt('May I have your name?', false, ' ');
    line("Hello, %s!\n", $userName);

    return $userName;
}

function getUserAnswer($question)
{
    line("Question: {$question}");
    return prompt("Your answer", $marker = '');
}

function showRoundResults($userName, $userAnswer, $correctAnswer)
{
    $isUserWon = $correctAnswer == $userAnswer;

    if (!$isUserWon) {
        line("\"%R{$userAnswer}%n\" is wrong answer :( Correct answer was \"%G{$correctAnswer}%n\".");
        line("Let's try again, $userName!" . PHP_EOL);
    } else {
        line("%GCorrect!%n");
    }

    return $isUserWon;
}
