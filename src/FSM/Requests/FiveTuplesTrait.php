<?php

namespace FSM\Requests;

trait FiveTuplesTrait
{
    /** @var string[] */
    protected array $availableStates;
    /** @var string */
    protected string $alphabet;
    /** @var string */
    protected string $initialState;
    /** @var string[] */
    protected array $finalStates;
    /** @var string[][] */
    protected array $transition;

    /** @return  string[] */

    public function getAvailableStates(): array
    {
        return $this->availableStates;
    }

    public function getAlphabet(): string
    {
        return $this->alphabet;
    }

    public function getInitialState(): string
    {
        return $this->initialState;
    }

    /** @return  string[] */

    public function getFinalStates(): array
    {
        return $this->finalStates;
    }

    /** @return  string[][] */
    public function getTransition(): array
    {
        return $this->transition;
    }
}
