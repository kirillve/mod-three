<?php

namespace ModThree;

use FSM\Event;

class BinaryStringObject
{
    public function __construct(private string $binary)
    {
    }

    public function mod3(): int
    {
        $mod3StateMachine = new MOD3StateMachine();
        for ($i = 0; $i < strlen($this->binary); $i++) {
            $mod3StateMachine->handleEvent(new Event($this->binary[$i]));
        }

        return (int)$mod3StateMachine->getCurrentStateValue();
    }
}
