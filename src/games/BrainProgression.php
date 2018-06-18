<?php
namespace BrainGames\BrainProgression;

use function BrainGames\Gameplay\startNewGame;

const MIN = 1;
const MAX = 10;
const LENGTH = 10;
const DESCRIPTION = "What number is missing in this progression?";

function makeProgression()
{
    $progression = [];

    $d = rand(MIN, MAX);
    $start = rand(MIN, MAX);

    for ($i = 0; $i <= LENGTH - 1; $i++) {
        $progression[] = $start + $d * ($i);
    }

    return $progression;
}

function run()
{
    $getGameData = function () {
        $progression = makeProgression(MIN, MAX, LENGTH);
        $spaceIndex = rand(0, LENGTH - 1);
        $answer = $progression[$spaceIndex];
        $progression[$spaceIndex] = "...";

        return [
            'question' => join(", ", $progression),
            'answer' => (string) $answer
        ];
    };

    return startNewGame(DESCRIPTION, $getGameData);
}
