<?php

namespace ModThree;

use FSM\FSM;
use ModThree\Evaluators\FSMMOD3Evaluator;

class Facade
{
    public static function modThree(string $input): int
    {
        $modThree = new ModThree(new FSMMOD3Evaluator(new FSM()));

        return $modThree->evaluate($input);
    }
}
