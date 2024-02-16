<?php

namespace FSM;

class Event implements EventInterface
{
    public function __construct(private readonly string $name)
    {
    }

    #[\Override]
    public function getName(): string
    {
        return $this->name;
    }
}
