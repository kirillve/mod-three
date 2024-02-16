<?php

namespace FSM;

interface StateMachineInterface
{
    public function getCurrentState(): string;

    public function getCurrentStateValue(): mixed;

    public function handleEvent(EventInterface $event): void;
}
