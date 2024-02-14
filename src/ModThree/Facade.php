<?php

namespace ModThree;

use FSM\FSM;
use FSM\OutputHandlers\MOD3OutputHandler;
use FSM\Requests\MOD3Automation;

class Facade
{
    public static function facade(string $input): int
    {
        return (int)(new FSM(new MOD3OutputHandler()))->evaluate(new MOD3Automation($input));
    }
}
