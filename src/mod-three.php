<?php

use FSM\OutputHandlers\MOD3OutputHandler;
use FSM\Requests\MOD3Automation;
use FSM\UnsupportedStateException;

/**
 * @throws UnsupportedStateException
 */
function modThree(string $input): int
{
    return (int)(new FSM\FSM(new MOD3OutputHandler()))->evaluate(new MOD3Automation($input));
}
