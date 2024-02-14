<?php

namespace FSM\OutputHandlers;

use FSM\OutputHandlerInterface;

class MOD3OutputHandler implements OutputHandlerInterface
{
    /** @var array|int[] */
    private array $mapping = [
        'S0' => 0,
        'S1' => 1,
        'S2' => 2,
    ];

    #[\Override]
    public function handleOutput(string $currentState): mixed
    {
        return $this->mapping[$currentState] ?? '';
    }
}
