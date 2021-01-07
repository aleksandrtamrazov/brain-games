<?php

namespace Php\Project\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_QUESTIONS = 3;

function engine(string $description, $game)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($description);

    for($i = 0; $i < COUNT_QUESTIONS; $i++) {
        ["question" => $question, "rightAnswer" => $rightAnswer] = $game();
        line("Question: %s", $question);
        $userAnswer = prompt("Your answer");

        if ($userAnswer == $rightAnswer) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.Let's try again, %s!", $userAnswer, $rightAnswer);
            return;
        }
    }
    line("Congratulations, %s!", $name);
    return;
}