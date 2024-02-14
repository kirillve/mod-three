<?php

namespace FSM;

interface FiveTuplesRequestInterface
{
    /** @return  string[] */
    public function getAvailableStates(): array;
    public function getAlphabet(): string;
    public function getInitialState(): string;
    /** @return  string[] */
    public function getFinalStates(): array;
    /** @return  string[][] */
    public function getTransition(): array;
}
