<?php
namespace BrainGames\utils;

const MIN = 1;
const MAX = 100;

function getRandomNumber()
{
    return rand(MIN, MAX);
}
