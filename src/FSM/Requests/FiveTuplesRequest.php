<?php

namespace FSM\Requests;

use FSM\FiveTuplesRequestInterface;

class FiveTuplesRequest implements FiveTuplesRequestInterface
{
    use FiveTuplesTrait;

    /**
     * @param string[] $availableStates
     * @param string[] $finalStates
     * @param string[][] $transition
     */
    public function __construct(
        array $availableStates,
        string $alphabet,
        string $initialState,
        array $finalStates,
        array $transition
    ) {
        $this->availableStates = $availableStates;
        $this->alphabet = $alphabet;
        $this->initialState = $initialState;
        $this->finalStates = $finalStates;
        $this->transition = $transition;
    }

}
