<?php

namespace FSM\OutputHandlers;

use FSM\OutputHandlerInterface;

class GenericOutputHandler implements OutputHandlerInterface
{
    /**
     * @param array<mixed> $mapping
     */
    public function __construct(private array $mapping = [])
    {
    }


    #[\Override]
    public function handleOutput(string $currentState): mixed
    {
        return $this->mapping[$currentState] ?? '';
    }
}
