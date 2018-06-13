<?php
namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function run()
{
    greet();
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}

function getUserName()
{
    return prompt("May I have your name?", false, ' ');
}

function greet(string $msg = '')
{
    line("%W%4 Welcome to the Brain Game! %n");
    line($msg);
}
