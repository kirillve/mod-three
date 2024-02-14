<?php

namespace FSM\OutputHandlers;

use FSM\OutputHandlerInterface;

class StatePassThroughOutputHandler implements OutputHandlerInterface
{
    #[\Override]
    public function handleOutput(string $currentState): mixed
    {
        return $currentState;
    }
}
