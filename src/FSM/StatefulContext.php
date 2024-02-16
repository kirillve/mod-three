<?php

namespace FSM;

class StatefulContext
{
    private string $currentState;

    /**
     * @param string[] $availableStates
     * @param string[] $finalStates
     * @param string[][] $transitionRules
     *
     * @throws UnsupportedStateException
     */
    public function __construct(
        private readonly array $availableStates,
        private readonly array $finalStates,
        private readonly array $transitionRules,
        string $initialState,
    ) {
        $this->setCurrentState($initialState);
    }

    public function transitState(EventInterface $event): void
    {
        if (isset($this->transitionRules[$this->currentState][$event->getName()])) {
            $nextState = $this->transitionRules[$this->currentState][$event->getName()];
            $this->setCurrentState($nextState);
        } else {
            throw new UnsupportedStateException('Unsupported event ' . $event->getName() . ' for the state: ' . $this->currentState);
        }
    }

    public function getFinalState(): string
    {
        if (!in_array($this->currentState, $this->finalStates)) {
            throw new UnsupportedStateException('Unsupported state: ' . $this->currentState);
        }

        return $this->currentState;
    }

    public function setCurrentState(string $currentState): void
    {
        if (!in_array($currentState, $this->availableStates)) {
            throw new UnsupportedStateException('Unsupported state: ' . $currentState);
        }

        $this->currentState = $currentState;
    }
}
