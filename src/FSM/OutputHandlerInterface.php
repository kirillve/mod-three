<?php

namespace FSM;

interface OutputHandlerInterface
{
    public function handleOutput(string $currentState): mixed;
}
