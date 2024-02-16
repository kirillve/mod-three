<?php

namespace ModThree;

use FSM\EventInterface;
use FSM\StatefulContext;
use FSM\StateMachineInterface;
use FSM\UnsupportedStateException;

class MOD3StateMachine implements StateMachineInterface
{
    private const array RESPONSE_MAPPING = [
        'S0' => 0,
        'S1' => 1,
        'S2' => 2,
    ];
    private readonly StatefulContext $context;

    /**
     * @throws UnsupportedStateException
     */
    public function __construct()
    {
        $this->context = new StatefulContext(
            ['S0', 'S1', 'S2'],
            ['S0', 'S1', 'S2'],
            [
                'S0' => [
                    '0' => 'S0',
                    '1' => 'S1',
                ],
                'S1' => [
                    '0' => 'S2',
                    '1' => 'S0',
                ],
                'S2' => [
                    '0' => 'S1',
                    '1' => 'S2',
                ],
            ],
            'S0',
        );
    }

    #[\Override]
    public function getCurrentStateValue(): mixed
    {
        return self::RESPONSE_MAPPING[$this->getCurrentState()] ?? null;
    }

    /**
     * @throws UnsupportedStateException
     */
    #[\Override]
    public function getCurrentState(): string
    {
        return $this->context->getFinalState();
    }

    /**
     * @throws UnsupportedStateException
     */
    #[\Override]
    public function handleEvent(EventInterface $event): void
    {
        $this->context->transitState($event);
    }
}
