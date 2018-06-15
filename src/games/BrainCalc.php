<?php
namespace BrainGames\BrainCalc;

use function BrainGames\Gameplay\startNewGame;

const MIN = 1;
const MAX = 100;
const OPERATIONS = ['+', '-', '*'];
const DESCRIPTION = "What is the result of the expression?";

function run()
{
    $question = function () {
        return rand(MIN, MAX) . ' ' . OPERATIONS[rand(0, count(OPERATIONS) - 1)] . ' ' . rand(MIN, MAX);
    };

    $answer = function ($question) {
        [$num1, $operator, $num2] = explode(" ", $question);

        switch ($operator) {
            case '+':
                return $num1 + $num2;
                break;
            case '*':
                return $num1 * $num2;
                break;
            case '-':
                return $num1 - $num2;
                break;
        }
    };

    return startNewGame(DESCRIPTION, $question, $answer);
}
