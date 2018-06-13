<?php
namespace BrainGames\BrainCalc;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\greet;
use function BrainGames\Cli\getUserName;

const MIN = 1;
const MAX = 100;
const OPERATIONS = ['+', '-', '*'];

function getNumber($min, $max)
{
    return rand($min, max);
}

function getOperation()
{
    $max = count(OPERATIONS) - 1;
    return OPERATIONS[rand(0, $max)];
}
